<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form>
		<input type="text" name="s_name" value="{{$s_name}}" placeholder="请输入姓名">
		<input type="text" name="s_class" value="{{$s_class}}" placeholder="请输入班级">
		<input type="submit" value="搜索">
	</form>
<table border>
	<tr>
		<td>编号</td>
		<td>姓名</td>
		<td>性别</td>
		<td>班级</td>
		<td>成绩</td>
		<td>照片</td>
		<td>操作</td>
	</tr>
	@foreach($data as $k=>$v)
	<tr>
		<td>{{$v->s_id}}</td>
		<td>{{$v->s_name}}</td>
		<td>{{$v->s_sex==1?'男':'女'}}</td>
		<td>{{$v->s_class}}</td>
		<td>{{$v->s_chengji}}</td>
		<td>@if($v->s_img)<img src="{{env('UPLODA_URL')}}{{$v->s_img}}" width="30" height="30">@endif</td>
		<td>
			<a href="{{url('student/edit/'.$v->s_id)}}">编辑</a>
			<a href="{{url('student/destroy/'.$v->s_id)}}">删除</a>
		</td>
	</tr>
	@endforeach

</table>
<tr><td clospan="3">{{$data->appends(['s_name'=>$s_name,'s_class'=>$s_class])->links()}}</td></tr>
</body>
</html>