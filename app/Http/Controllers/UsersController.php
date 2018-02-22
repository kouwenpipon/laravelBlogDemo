<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsersController extends Controller
{
    public function register()
    {
        return view('users.register');
//        return 'here';
    }

    public function store(UserRegisterRequest $request)
    {
//        dd($request->all());
        User::create(array_merge($request->all(),['avatar'=>'/images/default-avatar.png']));
        return redirect('/');
    }
}
