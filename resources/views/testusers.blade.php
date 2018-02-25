@extends('app')
@section('content')
    <div class="jumbotron">
        <div class="container">
            <h2>查看SQlite[Users]資料!
                <a class="btn btn-primary btn-lg pull-right" href="#" role="button" >發布新文章 »</a>
            </h2>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9" role="main">
                <table class="table">
                    <tr><th>執行</th><th>ID</th><th>姓名</th><th>電子郵件</th><th>圖示</th><th>確認碼</th><th>確認</th><th>密碼</th></tr>
                @foreach($users as $user)
                        <tr>
                            <td><a class="btn btn-primary btn-lg pull-right" role="button" href="{{url('user/delete/'.$user->id)}}">刪除 »</a></td>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->avatar}}</td>
                            <td>{{$user->confirm_code}}</td>
                            <td>{{$user->is_confirmed}}</td>
                            <td>{{$user->password}}</td>
                            </tr>
                @endforeach
                </table>
            </div>
        </div>
    </div>
@stop