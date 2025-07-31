<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category; // Make sure this path is correct and the Category model exists at app/Models/Category.php
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    // Validation rules for product creation
    private function validationRules(){
        return [
            'Name_EN' => 'required|string|max:255',
            'Name_KH' => 'nullable|string|max:255',
            'brand' => 'nullable|string|max:255',
            'discount_percent' => 'nullable|numeric|min:0|max:100',
            'price_after_discount' => 'nullable|numeric',
            'original_price' => 'nullable|numeric',
            'color_type' => 'required|string|max:7',
            'size' => 'required|string|max:100',
            'description' => 'nullable|string',
            'image_url' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
            'image_url1' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
            'image_url2' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
            'image_url3' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
            'image_url4' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
            'status' => 'nullable|in:1,0', // Assuming '1' is active and '0' is inactive
        ];
    }
    
    public function index(){
        // Display status = 1
        $products = DB::table('products')->select('id','Name_EN','Name_KH','image_url')->where('status', '1')->get();
        return view('admin.product.index',compact('products')); // Pass users to the view
    }

    public function create(){
        // Instead of this in every method:
        $categorys = Category::with('subcategories')->get(); 
        return view('admin.product.create', compact('categorys'));
    }

    public function store(Request $request){
        // Step 1: Validate input
        $validated = $request->validate($this->validationRules());

        // Initialize an array to store all image FILENAMES for the database
        // Keys in this array MUST MATCH your database column names EXACTLY
        $imageFileNamesForDatabase = [
            'image_url' => null,
            'img_url1' => null,
            'img_url2' => null,
            'img_url3' => null,
            'img_url4' => null,
        ];

        // Define the base storage path where files will be physically saved
        $relativePathForStorage = 'assets/img/products/';
        $fullSystemPathForStorage = public_path($relativePathForStorage);

        // Loop through all potential image fields
        for ($i = 0; $i <= 4; $i++) {
            // This determines the 'name' attribute from your HTML form (e.g., 'img_url', 'img_url1')
            $inputName = ($i === 0) ? 'img_url' : 'img_url' . $i;
            $dbColumnName = ($i === 0) ? 'image_url' : 'img_url' . $i; // <--- CRITICAL CORRECTION HERE

            if ($request->hasFile($inputName)) {
                $file = $request->file($inputName);
                // Generate a unique filename
                $randomFileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                // Move the file to the actual storage location
                $file->move($fullSystemPathForStorage, $randomFileName);
                // Store the filename in our array using the correct database column name as the key
                $imageFileNamesForDatabase[$dbColumnName] = $randomFileName;
            }
        }

        try {
            // Step 2: Use mass assignment safely
            $product = Product::create([
                'Name_EN' => $validated['Name_EN'],
                'Name_KH' => $validated['Name_KH'] ?? null,
                'brand' => $validated['brand'] ?? null,
                'original_price' => $validated['original_price'] ?? null,
                'discount_percent' => $validated['discount_percent'] ?? 0,
                'price_after_discount' => $validated['price_after_discount'] ?? null,
                'stock_quantity' => $validated['stock_quantity'] ?? 0,
                'color_type' => $validated['color_type'] ?? null,
                'size' => $validated['size'] ?? null,
                'category_id' => $validated['category_id'] ?? null,
                'sub_category_id' => $validated['sub_category_id'] ?? null,
                'description' => $validated['description'] ?? null,
                'delivery_option' => $validated['delivery_option'] ?? null, // Added based on your $fillable
                // Assign all image filenames from our prepared array using the correct DB column names
                'image_url' => $imageFileNamesForDatabase['image_url'],
                'img_url1' => $imageFileNamesForDatabase['img_url1'], 
                'img_url2' => $imageFileNamesForDatabase['img_url2'],
                'img_url3' => $imageFileNamesForDatabase['img_url3'],
                'img_url4' => $imageFileNamesForDatabase['img_url4'],
                'status' => $validated['status'] ?? '1', // Default to '1' if not provided
            ]);

            if ($product) {
                return redirect()->route('admin.product.index')->with('success', 'Product created successfully.');
            } else {
                return back()->withInput()->with('error', 'Failed to create product. No product instance returned.');
            }

        } catch (\Exception $e) {
            Log::error('Product creation failed: ' . $e->getMessage(), [
                'request_data' => $request->all(),
                'uploaded_filenames_for_db' => $imageFileNamesForDatabase,
                'exception_trace' => $e->getTraceAsString() // Add trace for better debugging
            ]);
            return back()->withInput()->with('error', 'Failed to create product. Please try again.');
        }
    }

    // This for caught the id of tb products
    public function edit($id){
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('product'));
    }

    // This function is for update product
    // It will handle both image uploads and updates
    public function update(Request $request, $id){
        // 1. Find the product or abort with 404
        $product = Product::findOrFail($id);

        // 2. Validate the incoming request data
        $validated = $request->validate($this->validationRules());

        // Initialize an array with existing image filenames from the product
        // This ensures un-uploaded images retain their current values.
        $imageFileNamesForDatabase = [
            'image_url' => $product->image_url,
            'img_url1' => $product->img_url1,
            'img_url2' => $product->img_url2,
            'img_url3' => $product->img_url3,
            'img_url4' => $product->img_url4,
        ];

        // Define the storage path for images
        $relativePathForStorage = 'assets/img/products/';
        $fullSystemPathForStorage = public_path($relativePathForStorage);

        // Ensure the directory exists before attempting to move files
        if (!File::isDirectory($fullSystemPathForStorage)) {
            File::makeDirectory($fullSystemPathForStorage, 0755, true, true);
        }

        // Loop through each potential image input (img_url, img_url1 to img_url4)
        for ($i = 0; $i <= 4; $i++) {
            // Determine the form input name (e.g., 'img_url', 'img_url1')
            $inputName = ($i === 0) ? 'img_url' : 'img_url' . $i;
            // Determine the corresponding database column name (e.g., 'image_url', 'img_url1')
            $dbColumnName = ($i === 0) ? 'image_url' : 'img_url' . $i;

            // Check if a new file has been uploaded for this field
            if ($request->hasFile($inputName)) {
                $file = $request->file($inputName);
                // If an old image exists, delete it before saving the new one
                if ($product->$dbColumnName && File::exists($fullSystemPathForStorage . $product->$dbColumnName)) {
                    File::delete($fullSystemPathForStorage . $product->$dbColumnName);
                }
                // Generate a unique filename for the new image
                $randomFileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                // Move the new file to the public directory
                $file->move($fullSystemPathForStorage, $randomFileName);
                // Update the filename in our array to be saved to the database
                $imageFileNamesForDatabase[$dbColumnName] = $randomFileName;

            } elseif ($request->has($inputName . '_clear')) {
                // This 'clear' flag handles cases where a user wants to remove an image
                // without uploading a new one. (Requires a checkbox/hidden input in the form)

                if ($product->$dbColumnName && File::exists($fullSystemPathForStorage . $product->$dbColumnName)) {
                    File::delete($fullSystemPathForStorage . $product->$dbColumnName);
                }
                $imageFileNamesForDatabase[$dbColumnName] = null; // Set the database field to null
            }
            // If no new file and no clear flag, the existing filename in $imageFileNamesForDatabase remains unchanged.
        }

        // 4. Update the product in the database
        try {
            $product->update([
                'Name_EN' => $validated['Name_EN'],
                'Name_KH' => $validated['Name_KH'] ?? null,
                'brand' => $validated['brand'] ?? null,
                'original_price' => $validated['original_price'] ?? null,
                'discount_percent' => $validated['discount_percent'] ?? 0,
                'price_after_discount' => $validated['price_after_discount'] ?? null,
                'stock_quantity' => $validated['stock_quantity'] ?? 0,
                'color_type' => $validated['color_type'] ?? null,
                'size' => $validated['size'] ?? null,
                'category_id' => $validated['category_id'] ?? null,
                'sub_category_id' => $validated['sub_category_id'] ?? null,
                'description' => $validated['description'] ?? null,
                'delivery_option' => $validated['delivery_option'] ?? null,

                // Assign the image filenames, whether old or newly uploaded
                'image_url' => $imageFileNamesForDatabase['image_url'],
                'img_url1' => $imageFileNamesForDatabase['img_url1'],
                'img_url2' => $imageFileNamesForDatabase['img_url2'],
                'img_url3' => $imageFileNamesForDatabase['img_url3'],
                'img_url4' => $imageFileNamesForDatabase['img_url4'],
                'status' => $validated['status'] ?? '1', // Default to '1' if not provided
            ]);

            // 5. Redirect with success message
            return redirect()->route('admin.product.index')->with('success', 'Product updated successfully.');

        } catch (\Exception $e) {
            // Log any errors that occur during the update process
            Log::error('Product update failed: ' . $e->getMessage(), [
                'product_id' => $id,
                'request_data' => $request->all(),
                'uploaded_filenames_for_db' => $imageFileNamesForDatabase,
                'exception_trace' => $e->getTraceAsString() // Add trace for better debugging
            ]);
            // Redirect back with an error message and repopulate form with old input
            return back()->withInput()->with('error', 'Failed to update product. Please try again.');
        }
    }

    public function destroy($id){
        // 1. Find the product or return 404
        $product = Product::findOrFail($id);
        // $relativePathForStorage = 'assets/img/products/'; // Not strictly needed for soft delete, but kept for context if you switch to hard delete later
        // $fullSystemPathForStorage = public_path($relativePathForStorage); // Same as above

        try {
            // 2. Soft Delete: Update the 'status' column to 0 (or your chosen 'deleted' status)
            $product->update(['status' => 0]); // Assuming 0 means 'inactive' or 'deleted'

            // Uncomment this section to delete images
            // $imageColumns = ['image_url', 'img_url1', 'img_url2', 'img_url3', 'img_url4'];
            // foreach ($imageColumns as $column) {
            //     if ($product->$column) {
            //         $filePath = $fullSystemPathForStorage . $product->$column;
            //         if (File::exists($filePath)) {
            //             File::delete($filePath);
            //         }
            //     }
            // }

            // 3. Redirect with success message
            return redirect()->route('admin.product.index')->with('success', 'Product moved to inactive/deleted status successfully.');

        } catch (\Exception $e) {
            // Log any errors that occur during the status update process
            Log::error('Product status update to inactive failed: ' . $e->getMessage(), [
                'product_id' => $id,
                'product_data' => $product->toArray(), // Log product data for context
                'exception_trace' => $e->getTraceAsString() // Add trace for better debugging
            ]);
            // Redirect back with an error message
            return back()->with('error', 'Failed to change product status. Please try again.');
        }
    }
}
