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
            'message' => 'User created successfully 123',
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
    public function getUserWithPostsAndComments()
    {
        $users = User::with(['postings.comments', 'comments'])->get();
        return response()->json($users);
    }

    public function getUserWithPostsAndComments1($id)
    {
        $user = User::with(['postings.comments', 'comments','postings'])->find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user);
    }
}