@foreach ($items as $item)
<option value="{{$item['id']}}">{{$count.$item['name']}}</option>
@if(isset($item['sub']))
@include('includes.admin.cate', array('items' => $item['sub'],'count'=>$count.'-'))
@endif
@endforeach