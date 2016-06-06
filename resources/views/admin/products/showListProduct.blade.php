@extends('admin.layout')
@section('title')
Show List Product
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
<div class="table-responsive">
	<a href="{!!asset('admin/products/add')!!}" class="btn btn-success pull-right">Upload New Product</a>
	<table id="tableshow" class="table table-hover">
		<tr>
			<th>STT</th>
			<th>ID</th>
			<th>Name</th>
			<th>Category</th>
			<th>Price</th>
			<th>Image</th>
			<th>Image Detail</th>
			<th>Availability</th>
			<th>Date</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>
		<?php $count=1;?>
		@foreach($products as $product)
		<tr>
			<td>{!!$count!!}</td>
			<td>{!!$product->id!!}</td>
			<td>{!!$product->name!!}</td>
			<td>
			@foreach($categories as $category)
				@if($category->id == $product->cate_id)
					{!!$category->name!!}
				@endif
			@endforeach
			</td>
			<td>${!!$product->price!!}</td>
			<td><img src="{!!asset('image/products/'.$product->image)!!}" alt="product-image" width="100"></td>
			<td>
			@foreach($product_imgs as $product_img)
				@if($product_img->product_id == $product->id)
					<img src="{!!asset('image/products/detail/'.$product_img->title)!!}" alt="product-detail" width="50">
				@endif
			@endforeach
			</td>
			<td>
				@if ($product->availability == 1)
				<a href="{!! asset('/admin/products/'.$product->id.'/setAvailability/'.$product->availability) !!}"><button class="btn btn-primary">In Stock</button></a>
				@else
				<a href="{!! asset('/admin/products/'.$product->id.'/setAvailability/'.$product->availability) !!}"><button class="btn btn-warning">Out Of Stock</button></a>
				@endif
			</td>
			<td>
				<?php 
					echo \Carbon\Carbon::createFromTimeStamp(strtotime($product->created_at))->diffForHumans();
				?>
			</td>
			<td><a href=" {!! asset('/admin/products/'.$product->id.'/edit') !!} "><i class="fa fa-pencil fa-lg"></i></a></td>
			<td>
				<a href="{!! asset('/admin/products/'.$product->id.'/del') !!}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><i class="fa fa-trash fa-lg"></i></a>
			</td>
		</tr>
		<?php $count++;?>
		@endforeach
	</table>
</div>
<center>{!! $products->setPath('')->appends(Input::query())->render() !!}</center>
@stop