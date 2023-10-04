<?php

namespace App\Http\Controllers;

use App\Http\Requests\Postings\StorePosting;
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
}