@extends('admin.layout')
@section('title')
Create New Category
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

	{!!Form::open(array(
		'action'=>'CategoriesController@postAdd',
		'method'=>'POST')
		)
	!!}
	<div class="form-group">
		{!!Form::label('parent_id', 'Parent Category', ['class' => 'control-label']) !!}
		<select name="parent_id" class="form-control">
			<option value="0" select="selected">Root Category</option>
			<?php showCateRecursive($cates); ?>
		</select>
	</div>
	
	<div class="form-group">
		{!!Form::label('name', 'Name', ['class' => 'control-label']) !!}
		{!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>

	{!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
	{!!Form::reset('Reset', array('class' => 'btn btn-danger'))!!}

	{!!Form::close()!!}
</div>
@stop