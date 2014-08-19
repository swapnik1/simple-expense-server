@extends('layouts.master')
<?php echo '<pre>'.$user.'</pre>'; ?>
@section('content')
{{ Form::open(array('action' => array('UserExpenseConrtroller@store', $user))) }}
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
		{{ Form::label('occurred_at', 'Date :') }}
		{{ Form::text('occurred_at') }}
	</div>
	<div>
		{{ Form::submit('Add Expense') }}
	</div>
{{ Form::close() }}

@stop