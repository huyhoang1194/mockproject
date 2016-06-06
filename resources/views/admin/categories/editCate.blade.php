@extends('admin.layout')
@section('title')
Edit Category
@stop
@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-6">
		{!! Form::model(
		$cate, [
			'method' => 'POST', 
			'action' =>  ['CategoriesController@postEdit', $cate["id"]]
			]
		) 
		!!}
			<div class="form-group">
				<label for="name">Name</label>
				<input name="name" value="{{$cate['name']}}" class="form-control">
			</div>
	
			<div class="form-group">
				<label for="parent_id">Parent</label>
				<select name="parent_id" class="form-control">
				@if ($cate["parent_id"] == 0)
					<option value="0">Root Category</option>
				@else
					<?php showCateRecursive($allCates,0,'',$cate["parent_id"]);?>
				@endif
				</select>
			</div>

			<div class="form-group">
				{!!Form::label('description', 'Description', ['class' => 'control-label']) !!}
				{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
				<script type="text/javascript">ckeditor ("description")</script>
			</div>
			{!! Form::submit('Update',array('class'=>'btn btn-primary'))!!}
			{!! Form::reset('Reset',array('class'=>'btn btn-danger'))!!}

		{!! Form::close() !!}
	</div>
</div>
@stop