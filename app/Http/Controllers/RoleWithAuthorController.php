<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleWithAuthorRequest;
use App\Models\Authors;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleWithAuthorController extends Controller
{
    //
    public function createRoleWithAuthor(StoreRoleWithAuthorRequest $request)
    {
        $roleData = $request->input('role_data');
        $authorIds = $request->input('authors_ids');
        $role = Role::create($roleData);
        $role->authors()->attach($authorIds);
        return response()->json([
            'message' => 'Role created with authors',
            'With roles' => $authorIds
        ]);
    }
    public function getRoleAuthor($id)
    {
        $role = Role::with('authors')->find($id);
        if (!$role) {
            return response()->json(['message' => 'Roles not found'], 404);
        }

        return response()->json(['user' => $role]);
    }


}