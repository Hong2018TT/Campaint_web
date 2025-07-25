<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index(){
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
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

    /**
     * Show the form for editing the specified user.
     */
    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage (with image upload).
     */
    public function update(Request $request, $id){
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:User,Administrator,Manager',
            'password' => 'nullable|min:6',  // ✅ Remove "confirmed"
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        // ✅ Update password only if it is filled
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // ✅ Handle image upload
        if ($request->hasFile('img_url_profile')) {
            if ($user->img_url_profile && file_exists(public_path($user->img_url_profile))) {
                unlink(public_path($user->img_url_profile));
            }

            $file = $request->file('img_url_profile');
            $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/users'), $filename);
            $user->img_url_profile = 'images/users/' . $filename;
        }

        if($user->save()){
            session()->flash('success', 'User updated successfully!');
            return redirect()->route('admin.users.index');
        } else {
            session()->flash('error', 'Failed to update user.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // ✅ Delete the image if exists
        if ($user->img_url_profile && file_exists(public_path($user->img_url_profile))) {
            unlink(public_path($user->img_url_profile));
        }

        if($user->delete()){
            return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
        }
    }

    public function profile(){
        // Get the currently logged-in user
        $users = Auth::user(); 
        // Pass the user object to the view
        return view('admin.users.profile', ['users' => $users]);
    }
}
