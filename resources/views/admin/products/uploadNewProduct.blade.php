@extends('admin.layout')
@section('title')
Upload New Product
@stop
@section('content')
{!!Form::open(array(
		'action'=>'ProductsController@postAdd',
		'method'=>'POST', 
		'files'=>true)
		)
!!}
<div class="col-md-6">
@include('errors.errors')
	<div class="form-group">
		{!!Form::label('cate_id', 'Category', ['class' => 'control-label']) !!}
		<select name="cate_id" class="form-control">
		<?php showCateRecursive($categories); ?>
		</select>
	</div>
	<div class="form-group">
		{!!Form::label('name', 'Name', ['class' => 'control-label']) !!}
		{!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>

	

	<div class="form-group">
		{!! Form::label('price', 'Price', ['class' => 'control-label']) !!}
		{!! Form::text('price', null, ['class' => 'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('image', 'Image', ['class' => 'control-label']) !!}
		{!! Form::file('image', null, ['class' => 'form-control']) !!}
	</div>

	<button type="button" class="btn btn-primary" id="addImages">Add More Detail Image</button>
	<div id="insert"></div>
	{!! Form::submit('Upload', ['class' => 'btn btn-primary']) !!}
	{!!Form::reset('Reset', array('class' => 'btn btn-danger'))!!}

</div>
<div class="col-md-1">
</div>

<div class="col-md-5">
<div class="form-group">
		{!!Form::label('description', 'Description', ['class' => 'control-label']) !!}
		{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
		<script type="text/javascript">ckeditor ("description")</script>
</div>
</div>
{!!Form::close()!!}
@stop
@section('js')
<script type="text/javascript">
	$(document).ready(function(){
		$('#addImages').click(function(){
			$('#insert').append('<div class="form-group"><input type="file" name="fProductDetail[]"></div>');
		});
	});
</script>
@stop