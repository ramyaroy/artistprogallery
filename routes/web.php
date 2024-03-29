<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'DisplayController@index');
Auth::routes();
Route::get('/dashboard', 'HomeController@index')->name('home');
Route::resource('/user', 'UserController');
Route::resource('gallery', 'GalleryController');
Route::resource('userprofile', 'UserProfilesController');

Route::get('/{username}', 'DisplayController@fetchuser');
