@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Suspend User
@stop

{{-- Content --}}
@section('content')

{{ Form::open(array('action' => array('UserController@suspend', $id), 'method' => 'post')) }}

    <h2>Suspend User</h2>

    <p>
        {{ Form::text('minutes', null, array('class' => 'form-control', 'placeholder' => 'Minutes', 'autofocus')) }}
        {{ ($errors->has('minutes') ? $errors->first('minutes') : '') }}
    </p>   	   

    {{ Form::hidden('id', $id) }}

    {{ Form::submit('Suspend User', array('class' => 'btn btn-primary')) }}
    
{{ Form::close() }}

@stop