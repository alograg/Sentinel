@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Create Group
@stop

{{-- Content --}}
@section('content')

{{ Form::open(array('action' => 'GroupController@store')) }}
    
    <h2>Create New Group</h2>
    
    <p>
        {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name')) }}
        {{ ($errors->has('name') ? $errors->first('name') : '') }}
    </p>

    <p>  
        Permissions
        <ul>
            <li>{{ Form::checkbox('adminPermissions', 1) }} Admin</li>
            <li>{{ Form::checkbox('userPermissions', 1) }} User</li>
        </ul>
    </p>

    {{ Form::submit('Create New Group', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
    
@stop