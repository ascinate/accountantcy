<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;  // Assuming you have a Role model

class RoleController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'role_name' => 'required|string|max:255',
            'role_description' => 'nullable|string',
            'permissions' => 'nullable|array',
            'permissions.*' => 'string|distinct',  // Each permission should be a string
        ]);

        // Prepare the data for insertion into the roles table
        $permissions = $request->input('permissions', []); // Default to empty array if no permissions are selected

        // Create the role and store it in the roles table
        $role = Role::create([
        'name' => $request->input('role_name'),
        'description' => $request->input('role_description'),
        'permissions' => $permissions, // Store permissions as an array (not JSON string)
    ]);

        // Redirect back with a success message
        return redirect('/role')->with('success', 'Role created successfully!');
    }
}
