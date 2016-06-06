@extends('admin.layout')
@section('title')
Show List Orders
@stop
@section('content')
<div class="row">
	<div class="col-xs-12">
		@if ($alert = Session::get('successMessage'))
		<div class="alert alert-success">
			<strong>{{ $alert }}</strong>
		</div>
		@endif
		@if ($alert = Session::get('errorMessage'))
		<div class="alert alert-danger">
			<strong>{{ $alert }}</strong>
		</div>
		@endif
	</div>
</div>
<div class="table-responsive">
	<table id="tableshow" class="table table-hover" width="100%">
		<tr>
			<th width="5%">STT</th>
			<th width="5%">ID</th>
			<th width="15%">Name</th>
			<th width="15%">Email</th>
			<th width="10%">Phone</th>
			<th width="10%">Address</th>
			<th width="10%">Post Code</th>
			<th width="10%">Required Date</th>
			<th width="10%">Status</th>
			<th width="10%">Detail</th>
		</tr>
		<?php $count=1;?>
		@foreach($orders as $item)
		<tr>
			<td>{!!$count!!}</td>
			<td>{!!$item->id!!}</td>
			<td>{!!$item->customer_name!!}</td>
			<td>{!!$item->email!!}</td>
			<td>{!!$item->phone!!}</td>
			<td>{!!$item->address_1!!}</td>
			<td>{!!$item->post_code!!}</td>
			<td>{!!$item->required_date!!}</td>
			<td>
				@if ($item->status == 0)
				<a href="{!! asset('/admin/orders/'.$item->id.'/setStatus/'.$item->status) !!}"><button class="btn btn-warning">Chưa ship</button></a>
				@else
				<a href="{!! asset('/admin/orders/'.$item->id.'/setStatus/'.$item->status) !!}"><button class="btn btn-success">Đã ship</button></a>
				@endif
			</td>
			<td><a href=" {!! asset('/admin/orders/'.$item->id.'/detail') !!} "><button class="btn btn-primary">Detail</button></a></td>
		</tr>
		<?php $count++;?>
		@endforeach
	</table>
</div>
<center>{!! $orders->setPath('')->appends(Input::query())->render() !!}</center>
@stop