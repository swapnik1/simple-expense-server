@extends('layouts.master')

{{ Form::open(['route' => 'users.store']) }}
	<div>
		{{ Form::label('email', 'Email :') }}
		{{ Form::text('email') }}
	</div>
	<div>
		{{ Form::label('password', 'Password :') }}
		{{ Form::password('password') }}
	</div>
	<div>
		{{ Form::submit('Create User') }}
	</div>
{{ Form::close() }}