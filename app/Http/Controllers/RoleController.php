<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRolesRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function store(StoreRolesRequest $request)
    {
        $validated = $request->validated();
        $role = Role::create($validated);
        return response()->json([
            'message' => 'User created successfully',
            'details' => $role
        ], 201);
    }
}
