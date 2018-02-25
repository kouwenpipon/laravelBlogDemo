@extends('app')
@section('content')
    <div class="jumbotron">
        <div class="container">
            <h2>查看SQlite[Discussions]資料!
                <a class="btn btn-primary btn-lg pull-right" href="#" role="button" >發布新文章 »</a>
            </h2>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9" role="main">
                <table class="table">
                    <tr><th>ID</th><th>標題</th><th>內容</th><th>使用者ID</th><th>最後使用者ID</th></tr>
                @foreach($discussions as $discussion)
                        <tr>
                            <td>{{$discussion->id}}</td>
                            <td>{{$discussion->title}}</td>
                            <td>{{$discussion->body}}</td>
                            <td>{{$discussion->user_id}}</td>
                            <td>{{$discussion->last_user_id}}</td>
                            </tr>
                @endforeach
                </table>
            </div>
        </div>
    </div>
@stop