@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Edit Profile
@stop

{{-- Content --}}
@section('content')

<h4>Edit 
@if ($user->email == Sentry::getUser()->email)
	Your
@else 
	{{ $user->email }}'s 
@endif 

Profile</h4>

{{ Form::open(array(
    'action' => array('UserController@update', $user->id), 
    'method' => 'put',
    'class' => 'form-horizontal', 
    'role' => 'form'
)) }}
        

    <p>
        {{ Form::label('edit_firstName', 'First Name') }}
        {{ Form::text('firstName', $user->first_name, array('placeholder' => 'First Name', 'id' => 'edit_firstName'))}}
        {{ ($errors->has('firstName') ? $errors->first('firstName') : '') }}
    </p>

    <p>
        {{ Form::label('edit_lastName', 'Last Name') }}
        {{ Form::text('lastName', $user->last_name, array('placeholder' => 'Last Name', 'id' => 'edit_lastName'))}}
        {{ ($errors->has('lastName') ? $errors->first('lastName') : '') }}
    </p>

    @if (Sentry::getUser()->hasAccess('admin'))
        <p>Group Memberships
            <ul>
                @foreach ($allGroups as $group)
                    <li>
                        <input type="checkbox" name="groups[{{ $group->id }}]" value='1' 
                        {{ (in_array($group->name, $userGroups) ? 'checked="checked"' : '') }} > {{ $group->name }}
                    </li>
                @endforeach
            </ul>
        </p>        
    @endif

    <p>         
        {{ Form::hidden('id', $user->id) }}
        {{ Form::submit('Submit Changes', array('class' => 'btn btn-primary'))}}
    </p>

{{ Form::close()}}

<hr />

<h4>Change Password</h4>
{{ Form::open(array(
    'action' => array('UserController@change', $user->id), 
    'class' => 'form-inline', 
    'role' => 'form'
    )) }}
        
    <p>
        {{ Form::label('oldPassword', 'Old Password') }}
		{{ Form::password('oldPassword', array('placeholder' => 'Old Password')) }}
        {{ ($errors->has('oldPassword') ? '<br />' . $errors->first('oldPassword') : '') }}
    </p>

    <p>
    	{{ Form::label('newPassword', 'New Password') }}
        {{ Form::password('newPassword', array('placeholder' => 'New Password')) }}
        {{ ($errors->has('newPassword') ?  '<br />' . $errors->first('newPassword') : '') }}
	</p>

    <p>
    	{{ Form::label('newPassword_confirmation', 'Confirm New Password', array('class' => 'sr-only')) }}
        {{ Form::password('newPassword_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirm New Password')) }}
        {{ ($errors->has('newPassword_confirmation') ? '<br />' . $errors->first('newPassword_confirmation') : '') }}
    </p>

    {{ Form::submit('Change Password', array('class' => 'btn btn-primary'))}} 

{{ Form::close() }}

@stop