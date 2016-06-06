@extends('admin.layout')
@section('title')
Show List User
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
<center>{!! $users->setPath('')->appends(Input::query())->render() !!}</center>
<div class="table-responsive">
	<a href="{!!asset('admin/users/add')!!}" class="btn btn-success pull-right">Create New User</a>
	<table id="tableshow" class="table table-hover" width="100%">
		<tr>
			<th width="3%">STT</th>
			<th width="3%">ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Avatar</th>
			<th>Status</th>
			<th width="5%">Role_id</th>
			<th width="5%">Key_active</th>
			<th>Created_at</th>
			<th>Updated_at</th>
			<th >Sửa</th>
			<th> Xóa</th>
		</tr>
		<?php $count = 1;?>
		@foreach($users as $user)
		<tr>
			<td>{!!$count!!}</td>
			<td>{!!$user->id!!}</td>
			<td>{!!$user->name!!}</td>
			<td>{!!$user->email!!}</td>
			<td>
				@if ($user->avatar!='')
				<img src="{!!asset('avatar/'.$user->avatar)!!}" alt="avatar" width="50" heigh="50">
				@else
				<img src="{!!asset('avatar/default.png')!!}" alt="avatar" width="50" heigh="50">
				@endif
			</td>
			<td>{!!$user->status!!}</td>
			<td>
				@if ($user->role_id == 1)
				@if(Auth::user()->id == $user->id)
				<button class="btn btn-primary" disabled>Admin</button>
				@else
				<a class="btn btn-primary" href="{!! asset('/admin/users/'.$user->id.'/setRole/'.$user->role_id) !!}">Admin</a>
				@endif
				@else
				<a class="btn btn-warning" href="{!! asset('/admin/users/'.$user->id.'/setRole/'.$user->role_id) !!}">User</a>
				@endif
			</td>
			<td>
				@if ($user->key_active == 1)
				<a href="{!! asset('/admin/users/'.$user->id.'/setActive/'.$user->key_active) !!}"><center><img src="{!! asset('assets/images/active.png') !!}" alt="active"></center></a>
				@else
				<a href="{!! asset('/admin/users/'.$user->id.'/setActive/'.$user->key_active) !!}"><center><img src="{!! asset('assets/images/notactive.png') !!}" alt="notactive"></center></a>
				@endif
			</td>
			<td>{!!$user->created_at!!}</td>
			<td>{!!$user->updated_at!!}</td>
			<td><a href=" {!! asset('/admin/users/'.$user->id.'/edit') !!} "><i class="fa fa-pencil fa-lg"></i></a></td>
			<td style="width: 100px;">
				@if(Auth::user()->id == $user->id)
				<i class="fa fa-trash fa-lg" disabled></i>
				@else
				<a href="{!! asset('/admin/users/'.$user->id.'/del') !!}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><i class="fa fa-trash fa-lg"></i></a>
				@endif
			</td>
		</tr>
		<?php $count++;?>
		@endforeach
	</table>
</div>
@stop