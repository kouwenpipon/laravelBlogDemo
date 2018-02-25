<?php

namespace App\Http\Controllers;

use App\Http\Requests\userLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\User;
use App\Discussion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function register()
    {
        return view('users.register');
//        return 'here';
    }

    public function store(UserRegisterRequest $request)
    {
        $data=[
            'confirm_code'=>str_random(48),
            'avatar'=>'/images/default-avatar.png'
            ];
        $user=User::create(array_merge($request->all(),$data));
        $subject='Confirm Your Email';
        $view='email.register';
        $this->sendTo($user,$subject,$view,$data);
        return redirect('/');
    }

    public function login()
    {
        return view('users.login');
    }

    public function signin(userLoginRequest $request)
    {
        if(Auth::attempt([
            'email'=>$request->get('email'),
            'password'=>$request->get('password'),
            'is_confirmed'=>1
        ])){
            return redirect('/');
        }
        Session::flash('user_login_failed','密碼不正確或電子郵件信箱沒驗證');
        return redirect('user/login')->withInput();
    }
    public function delete($id)
    {
        $user=User::where('id',$id)->first();
        $user->delete();
        $count=Discussion::where('user_id',$id)->count();
        for($i=1;$i<=$count;$i++){
            $discussion=Discussion::where('user_id',$id)->first();
            $discussion->delete();
        }
        return redirect('/userAll');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function confirmEmail($confirm_code)
    {
        $user=User::where('confirm_code',$confirm_code)->first();
        if(is_null($user)){
            return redirect('/');
        }
        $user->is_confirmed=1;
        $user->confirm_code=str_random(48);
        $user->save();
        return redirect('user/login');
    }
    private function sendTo($user,$subject,$view,$data=[])
    {
        \Mail::send($view,$data,function ($message) use ($user,$subject){
            $message->to($user->email)->subject($subject);
        });
        return 'Your email has been sent successfully!';
    }
    
}
