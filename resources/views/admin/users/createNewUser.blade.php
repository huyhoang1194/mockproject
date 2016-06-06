@extends('admin.layout')
@section('title')
Create New User
@stop
@section('url')
create
@stop
@section('content')

<div class="col-md-6">
@include('errors.errors')
	{!!Form::open(array(
		'action'=>'UsersController@postAdd',
		'method'=>'POST', 
		'files'=>true)
		)
	!!}
	<div class="form-group">
		{!!Form::label('name', 'Name', ['class' => 'control-label']) !!}
		{!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
		{!! Form::email('email', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
		{!! Form::text('password', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('role_id', 'Role_id', ['class' => 'control-label']) !!}
		<select class="form-control" name="role_id">
			<option value="0">User</option>
  			<option value="1">Admin</option>
		</select>
	</div>

	<div class="form-group">
		{!! Form::label('key_active', 'Key_active', ['class' => 'control-label']) !!}
		<select class="form-control" name="key_active">
  			<option value="1">Active</option>
  			<option value="0">Not Active</option>
		</select>
	</div>


	{!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
	{!!Form::reset('Reset', array('class' => 'btn btn-danger'))!!}

	{!!Form::close()!!}
</div>
@stop