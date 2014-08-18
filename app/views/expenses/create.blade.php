@extends('layouts.master')
<?php echo '<pre>'.$user.'</pre>'; ?>
@section('content')
{{ Form::open(array('action' => array('UserExpenseController@store', $user))) }}
	<div>
		{{ Form::label('name', 'Name :') }}
		{{ Form::text('name') }}
	</div>
	<div>
		{{ Form::label('amount', 'Amount :') }}
		{{ Form::text('amount') }}
	</div>
	<div>
		{{ Form::label('description', 'Description :') }}
		{{ Form::text('description') }}
	</div>
	<div>
		{{ Form::label('occured_at', 'Date :') }}
		{{ Form::text('occured_at') }}
	</div>
	<div>
		{{ Form::submit('Add Expense') }}
	</div>
{{ Form::close() }}

@stop