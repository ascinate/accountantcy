<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
// use App\Models\Permission;  // Assuming you have a Role model

class RoleController extends Controller
{
   


  
    public function store(Request $request)
   {
    // Validate the incoming data
    $request->validate([
        'role_name' => 'required|string|max:255',
        'role_description' => 'nullable|string',
        'permissions' => 'nullable|array', // Make permissions optional
        'permissions.*' => 'string|distinct', // Each permission should be a string
    ]);

    // Get the permissions, default to empty array if no permissions are selected
    $permissions = $request->input('permissions', []);

    // If no permissions are selected, we set it as NULL
    if (empty($permissions)) {
        $permissions = null; // or you can use an empty array [] depending on your requirements
    } else {
        // Optionally, you can convert the array to JSON if you're storing it as a JSON string
        $permissions = json_encode($permissions);
    }

    // Create the role and store it in the roles table
    $role = Role::create([
        'name' => $request->input('role_name'),
        'description' => $request->input('role_description'),
        'permissions' => $permissions, // Store permissions as either NULL or JSON string
    ]);

    return redirect('/role');
  }

    


}
