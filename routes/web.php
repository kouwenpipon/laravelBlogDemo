<?php

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

//Route::get('/', function () {
//    return view('welcome');
//    return \App\User::all();
//});
Route::get('/','PostsController@index');
Route::resource('discussion','PostsController');
//註冊
Route::get('user/register','UsersController@register');
Route::post('user/register','UsersController@store');