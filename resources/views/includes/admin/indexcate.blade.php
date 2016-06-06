@foreach ($items as $item)
<tr>
	<td>
		{{ $count.$item['name'] }}
	</td>
	<td>{{ $item['id'] }} </td> 
	<td>{{ $item['parent_id'] }} </td> 
	<td>{{ $item['description'] }} </td>
	<td>
		<a href="{!! asset('admin/categories/'.$item['id'].'/addSubCate') !!}" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm SubCate</a>
	</td>
	<td>
		<a href="{!! asset('admin/categories/'.$item['id'].'/edit') !!}" class="btn btn-warning"><i class="fa fa-pencil"></i> Sửa</a>
	</td>
	<td>
		<a href="{!! asset('admin/categories/'.$item['id'].'/del') !!}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><i class="fa fa-trash"></i> Xóa</a>
	</td>
</tr>
@if(isset($item['sub']))
@include('includes.admin.indexcate', array('items' => $item['sub'],'count'=>$count.'../'))
@endif
@endforeach