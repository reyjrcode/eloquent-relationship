<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comments\StoreCommentRequest;
use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //
    public function storeComments(StoreCommentRequest $request)
    {
        $validated = $request->validated();
        $comments = Comments::create($validated);
        return response()->json([
            'message' => 'Comments created successfully',
            'details' => $comments
        ], 201);
    }
}