@extends('layouts.app')

@section ('title')
    <title>Grand City - Admin</title>
@endsection

@section ('head')
    <style type="text/css">
        body {
            background: hsl(114,55%,58%) url(/img/bg.png) center top repeat;
            color: #524f4f;
        }
        .Login {
            width: 450px;
            height: auto;
            margin: 2em auto;
            background: #fff;
            padding: 2em 1.5em;
            border-radius: 0.3em;
            box-shadow: 0 0 10px 5px rgba(0,0,0,0.2);
        }
        .Login h2 { margin: 0; }
    </style>  
@endsection

@section ('content')
    <div class="Login">
        {!! Form::open(['action' => 'UsersController@signin']) !!}
            <h2>
                <img src="{{ asset('img/logo.png') }}" class="img-responsive">
                Admin Login</h2>
            <hr>

            @include ('errors._errors')
            
            <div class="form-group">
                {!! Form::label('username', 'Username') !!}         
                {!! Form::text('username', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password') !!}         
                {!! Form::password('password', ['class' => 'form-control']) !!} 
            </div>

            <div class="form-group">
                {!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}
            </div>
        
        {!! Form::close() !!}
    </div>
@endsection
