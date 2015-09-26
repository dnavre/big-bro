@extends('layouts.master')

@section('title', 'Welcome')

@section('content')
<div class="row">
    <h2>This template is using Bootstrap from a CDN!</h2>
    {!! Form::open(array('action' => 'Auth\AuthController@authenticate')) !!}


        <div class="form-group @if(isset($invalidCredentials))has-warning @endif">
            @if(isset($invalidCredentials))
             <label class="control-label" for="username">Invalid username or password</label>
            @endif
            <label for="username">Email address</label>
            <input name="username" type="username" class="form-control" id="username" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input name="password" type="password" class="form-control" id="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-default">Sign In</button>
    {!! Form::close() !!}
</div>
@endsection