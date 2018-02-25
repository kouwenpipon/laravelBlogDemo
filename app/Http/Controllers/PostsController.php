<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Http\Requests\storePostRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    /**
     * PostsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth',['only'=>['index','create','update','edit']]);
    }

    public function index()
    {
        $discussions=Discussion::all();
        return view('forum.index',compact('discussions'));
    }

    public function create()
    {
        return view('forum.create');
    }

    public function store(storePostRequest $request)
    {
        $data=[
            'user_id'=>Auth::user()->id,
            'last_user_id'=>Auth::user()->id,
        ];
        $discussion=Discussion::create(array_merge($request->all(),$data));
        return redirect()->action('PostsController@show',['id'=>$discussion->id]);
    }
    public function show($id)
    {
        $discussion=Discussion::findOrFail($id);
        return view('forum.show',compact('discussion'));
    }
}
