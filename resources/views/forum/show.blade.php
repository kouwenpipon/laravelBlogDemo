@extends('app')
@section('content')
    <div class="jumbotron">
        <div class="container">
            <div class="media">
                <div class="media-left">
                    <a href="#">
                        <img src="{{$discussion->user->avatar}}" alt="64x64" class="media-object img-circle" style="width:64px">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">{{$discussion->title}}</h4>
                    {{$discussion->user->name}}
                    <a class="btn btn-primary btn-lg pull-right" href="#" role="button" >修改文章 »</a>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9" role="main">
                <div class="blog-post">
                    {{$discussion->body}}
                </div>
            </div>
        </div>
    </div>
@stop