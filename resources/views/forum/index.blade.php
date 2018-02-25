@extends('app')
@section('content')
    <div class="jumbotron">
        <div class="container">
            <h2>歡迎來到Laravel製作Blog!
                <a class="btn btn-primary btn-lg pull-right" role="button" href="/discussions/create">發布新文章 »</a>
            </h2>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9" role="main">
                @foreach($discussions as $discussion)
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-circle" alt="64x64" src="{{$discussion->user->avatar}}" style="width: 64px ";>
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="/discussions/{{$discussion->id}}">{{$discussion->title}}</a></h4>
                            {{$discussion->user->name}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop