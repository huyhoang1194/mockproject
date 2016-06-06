@extends('admin.layout')
@section('title')
Edit Product
@stop
@section('content')
<style>
	.icon_del {
		position: relative;top:-50px;left:-40px;
	}
</style>
{!! Form::model(
	$product, [
		'method' => 'POST', 
		'action' =>  ['ProductsController@postEdit', $product['id']], 
		'files' => true,
		'enctype' => 'multipart/form-data',
		'name' => 'frmEditProduct'
		]
	) 
!!}
	<div class="col-md-6">
		@include('errors.errors')
		<div class="form-group">
			{!!Form::label('cate_id', 'Category', ['class' => 'control-label']) !!}
			<select name="cate_id" class="form-control">
				<?php showCateRecursive($categories, 0, "", $product['cate_id']); ?>
			</select>
		</div>
		<div class="form-group">
			{!!Form::label('name', 'Name', ['class' => 'control-label']) !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!!Form::label('description', 'Description', ['class' => 'control-label']) !!}
			{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
			<script type="text/javascript">ckeditor ("description")</script>
		</div>

		<div class="form-group">
			{!! Form::label('price', 'Price', ['class' => 'control-label']) !!}
			{!! Form::text('price', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('availability', 'Availability', ['class' => 'control-label']) !!}
			<select class="form-control" name="availability">
				<option value="{{$product['availability']}}" selected="selected">
				@if ($product['availability'] == 1)
				In Stock
				@else
				Out Of Stock
				@endif
				</option>
				@if ($product['availability'] == 1)
				<option value="0">Out Of Stock</option>
				@else
	  			<option value="1">In Stock</option>
	  			@endif
			</select>
		</div>
		
		{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
		{!! Form::reset('Reset', array('class' => 'btn btn-danger'))!!}

	</div>

	<div class="col-md-1">
		
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<img src="{!!asset('image/products/'.$product['image'])!!}" alt="productimage" width="300px">
		</div>

		<div class="form-group">
			{!! Form::label('image', 'Image', ['class' => 'control-label']) !!}
			<input type="file" name="image">
		</div>

		@foreach ($product_imgs as $key => $value)
			<div class="form-group" id="{!!$key!!}">
				<img src="{!!asset('image/products/detail/'.$value->title)!!}" class="img_del" alt="$valueg->slug" width="200px" idHinh="{!!$value->id!!}" id="{!!$key!!}">
				<a href="javascript:void(0)" type="button" id="del_img" class="btn btn-danger btn-circle icon_del"><i class="fa fa-times"></i></a>
			</div>
		@endforeach
		<button type="button" class="btn btn-primary" id="addImages">Add More Detail Image</button>
		<div id="insert"></div>
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

	$(document).ready(function(){
		$('a#del_img').click(function(){
			if(confirm("Bạn có chắc chắn muốn xóa?")){
				var url = "http://localhost/mockproject/public/admin/products/delimg/";
				var _token = $("form[name='frmEditProduct']").find("input[name='_token']").val();
				var idHinh = $(this).parent().find("img").attr("idHinh");
				var img = $(this).parent().find("img").attr("src");
				var rid = $(this).parent().find("img").attr("id");
				$.ajax({
					url: url + idHinh,
					type: 'GET',
					cache: false,
					data: {"_token":_token,"idHinh":idHinh,"urlHinh":img},
					success: function(data){
						if(data == "ok"){
							$("#"+rid).remove();
						}else{
							alert("Erorr");
						}
					}
				});
			}
		});
	});
</script>
@stop