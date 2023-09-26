<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('users', UserController::class);
Route::resource('profile', ProfileController::class);
Route::resource('posts', PostsController::class);
Route::get('/user/posts/{user}', [UserController::class, 'showPosts'])->name('user.posts');



Route::post('users/roles', [UserRoleController::class, 'createUserWithRoles']);
Route::get('users/role/{id}', [UserRoleController::class, 'getUserRoles']);
Route::put('users/roles/{userId}', [UserRoleController::class, 'updateUserRoles']);
Route::delete('users/roles/{userId}', [UserRoleController::class,'deleteUser']);
Route::resource('role', RoleController::class);