@extends('admin.layout')
@section('title')
Edit Image
@stop
@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-8 col-sm-push-4">
		@include('errors.errors')
		{!! Form::model($images, [
		'method' => 'PATCH', 
		'action' =>  ['ImagesController@update', $images->id], 
		'files' => true,
		'enctype' => 'multipart/form-data'
		]) 
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
		
		{!!Form::submit('Update', array('class' => 'btn btn-primary'))!!}
		{!!Form::reset('Reset', array('class' => 'btn btn-danger'))!!}

		{!!Form::close()!!}

	</div>

	<div class="col-xs-12 col-sm-4 col-sm-pull-8">
		<img src="{!!asset('image/'.$images->url)!!}" alt="{{$images->alt}}" width="300px">
	</div>
</div>
@stop