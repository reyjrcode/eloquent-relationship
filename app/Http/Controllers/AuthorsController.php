<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\StoreRoleWithAuthorRequest;
use App\Models\Authors;
use App\Models\Role;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
  
    public function store(StoreAuthorRequest $request)
    {
        $validated = $request->validated();
        $author = Authors::create($validated);
        return response()->json([
            'message' => 'Author created successfully',
            'details' => $author
        ], 201);
    }
}