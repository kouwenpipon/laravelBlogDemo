@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" role="main">
                {!! Form::open(['url' => '/discussions']) !!}
                <div class="form-group">
                    {!! Form::label('title', 'Title:'); !!}
                    {!! Form::text('title',null, ['class'=>'form-control']); !!}
                </div>
                <div class="form-group">
                    {!! Form::label('body', 'Body:'); !!}
                    {!! Form::textarea('body',null, ['class'=>'form-control']); !!}
                </div>
                {!! Form::submit('發表文章',['class'=>'btn btn-primary pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop