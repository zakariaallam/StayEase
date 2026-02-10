<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return Role::all();
    }

    /**
     * Use store() for saving data, not create().
     * Validation rules must be key => value pairs.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'role' => 'required|string|max:255' // Corrected validation format
        ]);

        Role::create($data);

        return response()->json(['message' => 'Role created successfully'], 201);
    }

    public function validate(Request $request,$user){
        $newRole = $request->validate([
            'new_role' => 'required'
        ]);
        // $user = 
    }
}