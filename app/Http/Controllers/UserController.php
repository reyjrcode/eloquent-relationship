<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $user = User::create($validated);
        return response()->json([
            'message' => 'User created successfully',
            'details' => $user
        ], 201);
    }

    public function show(User $user)
    {
        $user->load('profile');
        return $user;
    }
    public function showPosts(User $user)
    {
        $posts = Posts::where('post_id', $user->id)->paginate(10);
        return response()->json([
            'user' => $user,
            'posts' => $posts
        ]);
    }


}