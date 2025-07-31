<?php

namespace App\Http\Controllers;
use App\Models\About_us;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $about_us = About_us::firstOrNew([]); // returns a single model
        return view('admin.about.index',compact('about_us'));
    }

    public function update(Request $request)
    {
        // 1. Validate the incoming request.
        // The validated() method returns a clean array of the validated data.
        $validatedData = $request->validate([
            'description_khmer' => 'required|string',
            'description_english' => 'nullable|string',
        ]);

        // 2. Find the first record or create a new one, then fill and save it.
        // This one-liner handles both creating and updating the record.
        // Note: Ensure the model's $fillable property is set correctly.
        About_us::firstOrNew([])->fill($validatedData)->save();

        // 3. Redirect back with a success message.
        // Using ->with() is a convenient shorthand for flashing session data.
        return redirect('/about-us')
            ->with('success', 'About Us content updated successfully!');
    }
}
