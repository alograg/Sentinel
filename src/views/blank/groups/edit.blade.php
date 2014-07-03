@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Edit Group
@stop

{{-- Content --}}
@section('content')

{{ Form::open(array('action' =>  array('GroupController@update', $group->id), 'method' => 'put')) }}

    <h2>Edit Group</h2>
    
    <p>
        {{ Form::text('name', $group->name, array('placeholder' => 'Name')) }}
        {{ ($errors->has('name') ? $errors->first('name') : '') }}
    </p>

        
    <?php 
        $permissions = $group->getPermissions(); 
        if (!array_key_exists('admin', $permissions)) $permissions['admin'] = 0;
        if (!array_key_exists('users', $permissions)) $permissions['users'] = 0;
    ?>
        
    <p>
        <ul>
            <li>{{ Form::checkbox('adminPermissions', 1, $permissions['admin'] ) }} Admin</li>
            <li>{{ Form::checkbox('userPermissions', 1, $permissions['users'] ) }} Users</li>
        </ul>
    </p>

    {{ Form::hidden('id', $group->id) }}
    {{ Form::submit('Save Changes', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
   
@stop