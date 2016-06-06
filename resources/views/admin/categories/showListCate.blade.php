@extends('admin.layout')
@section('title')
Show List Category
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
		<a href="{!!asset('admin/categories/add')!!}" class="btn btn-success pull-right">Create New Category</a>
		<table id="tableshow" class="table table-hover">
				<tr>
					<th>Category</th>
					<th>ID</th>
					<th>Parent_id</th>
					<th>Description</th>
					<th >Thêm</th>
					<th>Sửa</th>
					<th>Xóa</th>
				</tr>
				@foreach($allCate as $category)
				<tr>
					<td><strong>{{ $category['name'] }}</strong> </td> 
					<td>{{ $category['id'] }} </td> 
					<td>{{ $category['parent_id'] }} </td> 
					<td>{{ $category['description'] }} </td>
					<td>
						<a href="{!! asset('admin/categories/'.$category['id'].'/addSubCate') !!}" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm SubCate</a>
               		</td>
					<td>
                        <a href="{!! asset('admin/categories/'.$category['id'].'/edit') !!}" class="btn btn-warning"><i class="fa fa-pencil"></i> Sửa</a>
               		</td>
               		<td>
               			<a href="{!! asset('admin/categories/'.$category['id'].'/del') !!}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><i class="fa fa-trash"></i> Xóa</a>
               		</td>
				</tr>
				<?php $count='../' ?>
				@if(isset($category['sub']))
				@include('includes.admin.indexcate', array('items' => $category['sub'],'count'=>$count))
				@endif
				@endforeach
			</table>
		</table>
	</div>
</div>
@stop