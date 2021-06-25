<?php

use Illuminate\Support\Facades\Route;
  use Illuminate\Support\Facades\App;
use App\Http\Controllers\HomeController;
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



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
 



Route::resource('roles','\App\Http\Controllers\RoleController');
Route::resource('permissions','\App\Http\Controllers\PermissionsController');
Route::resource('role-has-permissions','\App\Http\Controllers\RoleHasPermissionsController');
Route::resource('posts','\App\Http\Controllers\PostController');

 Route::get('ac/{locale}', function ($locale) {

      App::setLocale($locale);
 
       return redirect()->route('posts.index');
     
 

});

 Route::get('/',function(){
 return redirect()->route('posts.index');
 });