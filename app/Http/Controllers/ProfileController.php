<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function store(StoreProfileRequest $request){
        $validated = $request ->validated();
        $profile = Profile::create($validated);
        return response()->json([
            'message' => 'Profile created successfully',
            'details' => $profile
        ], 201);
    }
}
