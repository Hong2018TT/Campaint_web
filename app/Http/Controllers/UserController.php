<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(){
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create(){
        return view('admin.users.create');
    }
    /**
     * Store a newly created user in storage (with image upload).
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:User,Administrator,Manager',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'password_confirmation' => 'required|string|min:8', // Although 'confirmed' handles this implicitly, it's good practice to also validate its presence.
        ], [
            'password.min' => 'The password must be at least 8 characters.',
            'password.confirmed' => 'The password confirmation does not match.',
            // You can add more custom messages if needed
        ]);

        $data = $request->only(['name', 'email', 'role']);
        $data['password'] = Hash::make($request->password);
        $data['email_verified_at'] = now();
        $data['remember_token'] = Str::random(10);

        // ✅ Handle image upload
        if ($request->hasFile('img_url_profile')) {
            $file = $request->file('img_url_profile');
            $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/users'), $filename);
            $data['img_url_profile'] = 'images/users/' . $filename;
        }

        // 4. Create the user
        $user = User::create($data); // The create method directly saves the model
        // 5. Handle success redirection and flash message
        if ($user) { // Check if user creation was successful
            // Flash success message to the session
            session()->flash('success', 'User created successfully!');
            return redirect('/user');
        }
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(){

    }

    public function delete(){

    }

    public function profile(){
        // Get the currently logged-in user
        $users = Auth::user(); 
        // Pass the user object to the view
        return view('admin.users.profile', ['users' => $users]);
    }
}
