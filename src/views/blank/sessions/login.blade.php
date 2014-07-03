@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
Log In
@stop

{{-- Content --}}
@section('content')

{{ Form::open(array('action' => 'SessionController@store')) }}

    <h2>Sign In</h2>

    <p>{{ Form::text('email', null, array('placeholder' => 'E-mail')) }}
        {{ ($errors->has('email') ? $errors->first('email') : '') }}</p>

    <p>{{ Form::password('password', array('placeholder' => 'Password'))}}
        {{ ($errors->has('password') ?  $errors->first('password') : '') }}</p>
                
    <p>
        <label class="checkbox">
            {{ Form::checkbox('rememberMe', 'rememberMe') }} Remember me
        </label>
    </p>
        
    <p>{{ Form::submit('Sign In')}}
        
        <a href="{{ route('forgotPasswordForm') }}">Forgot Password</a>
    </p>

{{ Form::close() }}

@stop