<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form>
	<input type="text" name="j_name" value="{{$j_name}}" placeholder="请输入用户名">
	<input type="submit" value="搜索">
</form>
<table border>
	<tr>
		<td>ID</td>
		<td>用户名</td>
		<td>手机号</td>
		<td>邮箱</td>
		<td>头像</td>
		<td>操作</td>
	</tr>
	@foreach ($data as $k=>$v)
	<tr>
		<td>{{$v->j_id}}</td>
		<td>{{$v->j_name}}</td>
		<td>{{$v->j_tel}}</td>
		<td>{{$v->j_email}}</td>
		<td>@if($v->j_img)<img src="{{env('UPLODA_URL')}}{{$v->j_img}}" width="30" height="30">@endif</td>
		<td>
			<a href="{{url('jiafang/edit/'.$v->j_id)}}">编辑</a>
			<a href="{{url('jiafang/destroy/'.$v->j_id)}}">删除</a>
		</td>
	</tr>
	@endforeach
	
</table>
<tr><td clospan="7">{{$data->appends(['j_name'=>$j_name])->links()}}</td></tr>
</body>
</html>