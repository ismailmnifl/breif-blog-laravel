<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserPostController;




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

/* Route::get('/', function () {
    return view('welcome');
});
 */
//comments part
 route::get('/' , [HomeController::class,'index']);
 route::get('/detail/{id}' , [HomeController::class,'detail']);
 Route::post('/save-comment/{id}',[HomeController::class,'save_comment']);

//admin part 
 route::get('/admin/login' , [AdminController::class,'login']);
 route::post('/admin/login' , [AdminController::class,'submit_login']);
 Route::get('/admin/logout',[AdminController::class,'logout']);

//user posts
 Route::resource('userDash', UserPostController::class)->except(['destroy','update']);
 Route::get('/userposts/{id}/delete',[UserPostController::class,'destroy'])->name('postdel');
 Route::get('/userDash/{id}/edit',[UserPostController::class,'update'])->name('postup');
 

 route::get('/admin/dashboard' , [AdminController::class,'dashboard']);

//category
 route::resource('admin/category' , CategoryController::class);
 Route::get('admin/category/{id}/delete',[CategoryController::class,'destroy']);

//post
route::resource('admin/post' , PostController::class);
Route::get('admin/post/{id}/delete',[PostController::class,'destroy']);

  
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
