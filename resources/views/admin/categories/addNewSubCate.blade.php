@extends('admin.layout')
@section('title')
Add New SubCategory
@stop
@section('content')
@if (count($errors) > 0)
	<div class="alert alert-danger">
	    <h4>Whoops, looks like something went wrong.</h4>
	    <ul>
	        @foreach ($errors->all() as $error)
	            <li>{{ $error }}</li>
	        @endforeach
	    </ul>
	</div>
@endif
<div class="col-md-4">
	{!! Form::model(
		$categories, [
			'method' => 'POST', 
			]
		) 
	!!}

	<div class="form-group">
		{!!Form::label('name', 'Parent Category', ['class' => 'control-label']) !!}
		{!! Form::text('name', null, ['class' => 'form-control', 'readonly']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('id', 'Parent ID', ['class' => 'control-label']) !!}
		{!! Form::text('id', null, ['class' => 'form-control', 'readonly']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('subName', 'Name', ['class' => 'control-label']) !!}
		{!! Form::text('subName', null, ['class' => 'form-control']) !!}
	</div>

	{!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
	{!!Form::reset('Reset', array('class' => 'btn btn-danger'))!!}

	{!!Form::close()!!}
</div>
@stop