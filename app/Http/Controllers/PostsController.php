<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function store(StorePostRequest $request){
        $validated = $request->validated();
        $post = Posts::create($validated);
        return response()->json([
            'message' => 'Posts created successfully',
            'details' => $post
        ], 201);
    }

    
}
