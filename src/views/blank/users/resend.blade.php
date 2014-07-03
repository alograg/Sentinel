@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Resend Activation
@stop

{{-- Content --}}
@section('content')

{{ Form::open(array('action' => 'UserController@resend', 'method' => 'post')) }}
        	
    <h2>Resend Activation Email</h2>
	
    <p>
        {{ Form::text('email', null, array('placeholder' => 'E-mail')) }}
        {{ ($errors->has('email') ? $errors->first('email') : '') }}
    </p>

    {{ Form::submit('Resend') }}

{{ Form::close() }}
  
@stop
