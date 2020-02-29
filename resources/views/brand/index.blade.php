<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>商品展示</h1>
	<hr>
	<form>
		<input type="text" name="b_name" value="{{$b_name}}" placeholder="请输入商品名称">
		<input type="submit" value="搜索">
</form>
	</form>
<table border>
	<tr>
		<td>商品编号</td>
		<td>商品名称</td>
		<td>商品logo</td>
		<td>商品网址</td>
		<td>操作</td>
	</tr>
	@foreach($data as $k=>$v)
	<tr>
		<td>{{$v->b_id}}</td>
		<td>{{$v->b_name}}</td>
		<td>@if($v->b_img)<img src="{{env('UPLODA_URL')}}{{$v->b_img}}" width="30" height="30">@endif</td>
		<td>{{$v->b_url}}</td>
		<td>
			<a href="{{url('brand/edit/'.$v->b_id)}}">编辑</a>
			<a href="{{url('brand/destroy/'.$v->b_id)}}">删除</a>
		</td>
	</tr>
	@endforeach
</table>
<tr><td clospan="3">{{$data->appends(['b_name'=>$b_name])->links()}}</td></tr>
</body>
</html>