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
        // 1. Validate the incoming request data
        $request->validate([
            'description_khmer' => 'required|string', // Ensure the field is present and a string
        ]);

        // 2. Find the existing record or create a new one if it doesn't exist
        // This is crucial for "saving changes" whether it's an initial save or an update.
        $about_us = About_us::first(); // Try to find the first record

        if (!$about_us) {
            // If no record exists, create a new one
            $about_us = new About_us();
        }

        // 3. Assign the validated data to the model property
        // The 'description_khmer' comes from the 'name' attribute of your textarea/hidden input
        $about_us->description_khmer = $request->input('description_khmer');

        // 4. Save the changes to the database
        if($about_us->save()){
            session()->flash('success', 'About Us content updated successfully!');
            // Redirect back to the users list or another page
            return redirect('/about-us');
        }
    }
}
