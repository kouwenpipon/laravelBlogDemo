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
Route::resource('discussions','PostsController');
//註冊
Route::get('user/register','UsersController@register');
Route::post('user/register','UsersController@store');
Route::get('user/login','UsersController@login');
Route::post('user/login','UsersController@signin');
Route::get('user/delete/{id}','UsersController@delete');
Route::get('/verify/{confirm_code}','UsersController@confirmEmail');
Route::get('/logout','UsersController@logout');
//查看SQlite[User]資料
Route::get('userAll',function(){
    $users=App\User::all();
    return view('testusers',compact('users'));
});
//查看SQlite[Discussion]資料
Route::get('discussionAll',function (){
    $discussions=\App\Discussion::all();
    return view('testdiscussions',compact('discussions'));
});
//練習c語言
Route::get('testC',function (){
    //練習題1.
    //寫程式==為真，==為假
    $a=1=='1'?'true':'false';
    $b=1==='1'?'true':'false';
    if(strpos("abc", "a") ==0)
        $c="true";
    else
        $c="false";
    if(strpos("abc", "a") ===0)
        $d="true";
    else
        $d="false";
    echo "a=".$a."<br>"."b=".$b."<br>c=".$c."<br>"."d=".$d;
});