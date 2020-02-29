<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table>
	<tr>
		<td>ID</td>
		<td>库管姓名</td>
		<td>库管权限</td>
		<td>操作</td>
	</tr>
	@foreach ($res as $k=>$v)
	<tr>
		<td>{{$v->u_id}}</td>
		<td>{{$v->u_name}}</td>
		<td>{{$v->u_shenfen==1?'库管员':'主管'}}</td>
		<td>
			<a href="{{url('/userx/kgycreate')}}">主管通道</a>
			<a href="{{url('/kgy/index')}}">库管员通道</a>
		</td>
	</tr>
	@endforeach
</table>
</body>
</html>