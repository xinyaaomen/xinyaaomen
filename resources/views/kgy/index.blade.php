<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table>
	<tr>
		<td>ID</td>
		<td>货物/吨</td>
		<td>出入库/次</td>
		<td>主管操作</td>
	</tr>
	@foreach ($res as $k=>$v)
	<tr>
		<td>{{$v->k_id}}</td>
		<td>{{$v->k_huowu}}</td>
		<td>{{$v->k_churuku}}</td>
		<td>
			<a href="{{url('/kgy/edit/'.$v->k_id)}}">主管编辑</a>
			<a href="{{url('/kgy/destroy/'.$v->k_id)}}">主管删除</a>
		</td>
	</tr>
	@endforeach
</table>
</body>
</html>