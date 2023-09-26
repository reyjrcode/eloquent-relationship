<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserWithRoleRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    //
    public function createUserWithRoles(StoreUserWithRoleRequest $request)
    {
        $userData = $request->input('user_data');
        $rolesIds = $request->input('roles_ids');
        $user = User::create($userData);
        $user->roles()->attach($rolesIds);
        return response()->json([
            'message' => 'User created with roles',
            'With roles' => $rolesIds
        ]);

        // $user = User::find(1);
        // $user->roles()->attach([1, 2, 3]); // Attach roles to the user
        // $roles = $user->roles;
        // $role = Role::find(1);
        // $users = $role->users;
    }
    public function updateUserRoles(Request $request, $userId)
    {
        $user = User::find($userId);
        $user->roles()->sync($request->input('roles_ids'));
        return response()->json([
            'message' => 'User roles updated',
            'user' => $user,


        ]);
    }


    public function getUserRoles($id)
    {
        $user = User::with('roles')->find($id);

        // if(!$user){
        //     return response()->json(['message' => 'User not found'], 404);
        // }
        // $userRoles = $user->roles->map(function ($role){
        //     return [
        //         'email' => $role->email,
        //         'name' => $role->name,
        //     ];
        // });
        // return response()->json(['user_roles' => $userRoles]);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json(['user' => $user]);
    }
}