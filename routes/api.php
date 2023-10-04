<?php

use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostingsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleWithAuthorController;
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
Route::delete('users/roles/{userId}', [UserRoleController::class, 'deleteUser']);
Route::get('user/get/roles/', [UserRoleController::class, 'getUsersWithRoles']);
Route::resource('role', RoleController::class);


Route::resource('author', AuthorsController::class);
Route::post('role/author', [RoleWithAuthorController::class, 'createRoleWithAuthor']);
Route::get('roles/author/{id}', [RoleWithAuthorController::class, 'getRoleAuthor']);
Route::put('role/author/{id}', [RoleWithAuthorController::class, 'updateRoleWithAuthor']);
Route::delete('role/author/{id}', [RoleWithAuthorController::class, 'deleteRole']);
Route::get('get/role/author', [RoleWithAuthorController::class, 'getAllRoleWithAuthors']);

// postings
Route::post('store/posting',[PostingsController::class,'createPosting']);

// comments
Route::post('store/comments',[CommentsController::class,'storeComments']);
// get post with comments

Route::get('get/postwithcomment',[UserController::class,'getUserWithPostsAndComments']);