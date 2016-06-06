@extends('admin.layout')
@section('title')
Show Order Details
@stop
@section('content')
<div class="table-responsive">
	<table id="tableshow" class="table table-hover" width="100%">
		<tr>
			<th width="10%">STT</th>
			<th width="10%">Order_ID</th>
			<th width="20%">Product</th>
			<th width="15%">Image</th>
			<th width="15%">Size</th>
			<th width="15%">Quantity</th>
			<th width="15%">Price</th>
		</tr>
		<?php $count=1;?>
		@foreach($order_detail as $item)
		<tr>
			<td>{!!$count!!}</td>
			<td>{!!$item->order_id!!}</td>
			<td>{!!$item->name!!}</td>
			<td><img src="{!!asset('image/products/'.$item->image)!!}" alt="product-image" width="200"></td>
			<td>{!!$item->size!!}</td>
			<td>{!!$item->quantity!!}</td>
			<td>{!!$item->price_each!!}</td>
		</tr>
		<?php $count++;?>
		@endforeach
	</table>
</div>
@stop