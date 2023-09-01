<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\postController;
use App\Models\Post_info;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $posts = [];
    if(auth()->check()){
        $posts = auth()->user()->UserPost()->latest()->get();
    }
    
    //$posts = Post_info::where('user_id',auth()->id())->get();
    return view('home', ['post' => $posts]);
});
Route::post('/register',[UserController::class, 'register']);
Route::post('/logout',[UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);


Route::post('/new_post',[postController::class, 'CreatePost']);
Route::get('/edit-post/{post}', [postController::class, 'ShowPost']);
Route::put('/edit-post/{post}', [postController::class, 'EditPost']);
Route::delete('/delete-post/{post}', [postController::class, 'DeletePost']);