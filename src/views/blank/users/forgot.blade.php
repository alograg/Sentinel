@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Forgot Password
@stop

{{-- Content --}}
@section('content')

{{ Form::open(array('action' => 'UserController@forgot', 'method' => 'post')) }}
            
    <h2>Forgot your Password?</h2>
            
    <p>        
        {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'E-mail', 'autofocus')) }}
        {{ ($errors->has('email') ? $errors->first('email') : '') }}
    </p>

    {{ Form::submit('Send Instructions', array('class' => 'btn btn-primary'))}}

{{ Form::close() }}

@stop