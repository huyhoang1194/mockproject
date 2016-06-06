@extends('admin.layout')
@section('title')
Show List Image
@stop
@section('content')
	<div class="row">
		<div class="col-xs-12">
			@if ($alert = Session::get('successMessage'))
		        <div class="alert alert-success">
		            <h4>{{ $alert }}</h4>
		        </div>
		    @endif
		    @if ($alert = Session::get('errorMessage'))
		        <div class="alert alert-danger">
		            <h4>{{ $alert }}</h4>
		        </div>
		    @endif
		</div>
	</div>
	<center>{!! $images->setPath('')->appends(Input::query())->render() !!}</center>
	<div class="table-responsive">
		<a class="btn btn-success pull-right" href="{!!asset('admin/images/create')!!}">Upload New Image</a>
		<table class="table table-hover" id="tableshow" width="100%">
			<tr>
				<th width="5%">STT</th>
				<th  width="5%">ID</th>
				<th>Image</th>
				<th>Title</th>
				<th>Alt</th>
				<th colspan="2">Action</th>
			</tr>
			<?php $count = 1;?>
			@foreach($images as $image)
			<tr>
				<td>{!!$count!!}</td>
				<td>{!!$image->id!!}</td>
				<td><img src="{!!asset('image/products/detail/'.$image->title)!!}" alt="{{$image->alt}}" width="100px"></td>
				<td>{!!$image->title!!}</td>
				<td>{!!$image->alt!!}</td>
				<td><a class="btn btn-primary" href=" {!! route('admin.images.edit', $image->id) !!} "> Edit</a></td>
				<td style="width: 100px;">
					{!!Form::open([
						'action'=>['ImagesController@destroy', $image->id],
						'method'=>'DELETE',
						'onsubmit'=>'return confirm("Bạn có chắc chắn muốn xóa?")'
					])!!}
					{!!Form::submit('Delete', array('class'=> 'btn btn-danger'))!!}
					{!!Form::close()!!}

				</td>
			</tr>
			<?php $count++;?>
			@endforeach
		</table>
	</div>
@stop