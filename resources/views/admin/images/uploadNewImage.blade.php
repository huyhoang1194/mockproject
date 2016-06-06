@extends('admin.layout')
@section('title')
Upload New Image
@stop
@section('content')
@include('errors.errors')
<div class="col-md-6">
	{!!Form::open(array(
		'action'=>'ImagesController@store',
		'method'=>'POST', 
		'files'=>true)
		)
	!!}
	<div class="form-group">
		{!!Form::label('title', 'Title', ['class' => 'control-label']) !!}
		{!! Form::text('title', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
		{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
		<script type="text/javascript">ckeditor ("description")</script>
	</div>

	<div class="form-group">
		{!! Form::label('image', 'Image', ['class' => 'control-label']) !!}
		{!! Form::file('image', null, ['class' => 'form-control']) !!}
	</div>

	{!!Form::submit('Upload', array('class' => 'btn btn-primary'))!!}
	{!!Form::reset('Reset', array('class' => 'btn btn-danger'))!!}

	{!!Form::close()!!}
</div>
@stop