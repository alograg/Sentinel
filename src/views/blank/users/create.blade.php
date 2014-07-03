@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Create New User
@stop

{{-- Content --}}
@section('content')

{{ Form::open(array('action' => 'UserController@store')) }}

    <h2>Register New Account</h2>

    <p>{{ Form::text('email', null, array('placeholder' => 'E-mail')) }}
        {{ ($errors->has('email') ? $errors->first('email') : '') }}</p>

    <p>{{ Form::password('password', array('placeholder' => 'Password')) }}
       {{ ($errors->has('password') ?  $errors->first('password') : '') }}</p>

    <p>{{ Form::password('password_confirmation', array('placeholder' => 'Confirm Password')) }}
        {{ ($errors->has('password_confirmation') ?  $errors->first('password_confirmation') : '') }}</p>
            
    <p>{{ Form::submit('Create User') }}</p>
            
{{ Form::close() }}    

@stop