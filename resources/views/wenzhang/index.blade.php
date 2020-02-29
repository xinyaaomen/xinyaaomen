<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form>
		<input type="text" name="w_name" value="{{$w_name}}" placeholder="请输入标题">
		<input type="submit" value="搜索">
	</form>
<table border>
	<tr>
		<td>编号ID</td>
		<td>文章标题</td>
		<td>文章分类</td>
		<td>文章重要性</td>
		<td>是否显示</td>
		<td>文章作者</td>
		<td>作者email</td>
		<td>关键字</td>
		<td>网页描述</td>
		<td>上传文件</td>
		<td>操作</td>
	</tr>
	@foreach($data as $k=>$v)
	<tr>
		<td>{{$v->w_id}}</td>
		<td>{{$v->w_name}}</td>
		<td>{{$v->w_fenlei}}</td>
		<td>{{$v->w_zyx==1?'普通':'置顶'}}</td>
		<td>{{$v->w_sfxs==1?'显示':'不显示'}}</td>
		<td>{{$v->w_zuozhe}}</td>
		<td>{{$v->w_email}}</td>
		<td>{{$v->w_gjz}}</td>
		<td>{{$v->w_miaoshu}}</td>
		<td>@if($v->w_wenjian)<img src="{{env('UPLODA_URL')}}{{$v->w_wenjian}}" width="30" height="30">@endif</td>
		<td>
			<a href="{{url('wenzhang/edit/'.$v->w_id)}}">编辑</a>
			<a href="{{url('wenzhang/destroy/'.$v->w_id)}}">删除</a>
		</td>
	</tr>
	@endforeach
</table>
<tr><td clospan="3">{{$data->appends(['w_name'=>$w_name])->links()}}</td></tr>
</body>
</html>