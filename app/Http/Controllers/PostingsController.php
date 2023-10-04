<?php

namespace App\Http\Controllers;

use App\Http\Requests\Postings\StorePosting;
use App\Http\Requests\Postings\UpdatePostingsRequest;
use App\Models\Postings;
use Illuminate\Http\Request;

class PostingsController extends Controller
{
    //
    public function createPosting(StorePosting $request)
    {
        $validated = $request->validated();
        $postings = Postings::create($validated);
        return response()->json([
            'message' => 'Postings created successfully',
            'details' => $postings
        ], 201);
    }
    public function updatePostings(UpdatePostingsRequest $request, $id)
    {
        $post = Postings::findOrFail($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return response()->json([
            'message' => 'Postings updated',
            'Details' => $post,
        ]);
    }
    public function deletePostings($id) {
        $post = Postings::findOrFail($id);
        $post->delete();

        return response()->json([
            'message' => 'Postings Deleted',
            'Details' => $post,
        ]);
    }
    
}