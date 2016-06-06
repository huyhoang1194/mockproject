@extends('admin.layout')
@section('title')
Edit User
@stop
@section('url')
edit
@stop
@section('content')
<div class="col-md-6">
@include('errors.errors')
	{!! Form::model(
		$user, [
			'method' => 'POST', 
			'action' =>  ['UsersController@postEdit', $user->id], 
			'files' => true,
			'enctype' => 'multipart/form-data'
			]
		) 
	!!}

	<div class="form-group">
		{!!Form::label('name', 'Name', ['class' => 'control-label']) !!}
		{!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!!Form::label('email', 'Email', ['class' => 'control-label']) !!}
		{!! Form::text('email', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!!Form::label('status', 'Status', ['class' => 'control-label']) !!}
		{!! Form::text('status', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('role_id', 'Role_id', ['class' => 'control-label']) !!}
		<select class="form-control" name="role_id">
			<option value="{{$user->role_id}}" selected="selected">
			@if ($user->role_id == 1)
			Admin
			@else
			User
			@endif
			</option>
			@if ($user->role_id == 1)
			<option value="0">User</option>
			@else
  			<option value="1">Admin</option>
  			@endif
		</select>
	</div>

	<div class="form-group">
		{!! Form::label('key_active', 'Key_active', ['class' => 'control-label']) !!}
		<select class="form-control" name="key_active">
			<option value="{{$user->key_active}}" selected="selected">
			@if ($user->key_active == 1)
			Active
			@else
			Not Active
			@endif
			</option>
			@if ($user->key_active == 1)
			<option value="0">Not Active</option>
			@else
  			<option value="1">Active</option>
  			@endif
		</select>
	</div>

	<div class="form-group">
	@if ($user->avatar != null)
		<img src="{!!asset('avatar/'.$user->avatar)!!}" alt="{{$user->avatar}}" width="100px">
	@else
		<img src="{!!asset('avatar/default.png')!!}" alt="default.png" width="100px">
	@endif
	</div>

	<div class="form-group">
		
		{!! Form::label('avatar', 'Avatar', ['class' => 'control-label']) !!}
		{!! Form::file('avatar', null, ['class' => 'form-control']) !!}
	</div>

	{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
	{!!Form::reset('Reset', array('class' => 'btn btn-danger'))!!}

	{!!Form::close()!!}
</div>
@stop