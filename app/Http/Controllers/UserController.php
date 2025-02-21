<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function viewuser()
    {
        $users = User::all(); 
        $role = Role::all();
        return view('user', [
            'users' => $users,
            'roles' => $role,  
        ]);
    }


    public function login(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        // Get the user from the database
        $admin = DB::table('users')
            ->where('email', $request->email)
            ->first();
    
        // Check if the user exists and if the password matches the hashed password
        if ($admin && Hash::check($request->password, $admin->password)) {
            // Store user info in session
            $request->session()->put('adminuser', $admin->email);
            $request->session()->put('admin_name', $admin->name);
            $request->session()->put('role_id', $admin->role_id);
            $request->session()->put('role_permission', $admin->role_id);
            $admin_id =Session::get('role_id');

            $role = DB::table('roles')
            ->where('id', $admin_id)
            ->first();
            if(!empty($role)){
                $request->session()->put('role_permission', $role->permissions);
            }
            // dd($admin_id);
            //dd($admin->role_id);
            // Redirect to the desired page (e.g., index)
            return view('index');
        } else {
            // If credentials are incorrect, redirect back with error message
            return redirect('/')->with('error', 'Invalid email or password.');
        }
    }
    

    public function store(Request $request)
    {   
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:2',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:3048',
             'role_id' => 'required|max:11',
            'status' => 'required|in:Active,Inactive',
            'warehouse' => 'required|string|max:255',
        ]);
    
        
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $imagePath = time() . '_' . $file->getClientOriginalName();
            $file->move('uploads', $imagePath);
            $validatedData['profile_image'] = $imagePath; 
        }
    
        $validatedData['password'] = Hash::make($request->password);
        $role_id = $validatedData['role_id'];
        $request->session()->put('role_id', $role_id);
        //dd($validatedData);
        User::create($validatedData);

    
        return redirect()->back()->with('success', 'Record added successfully!');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully!');
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
