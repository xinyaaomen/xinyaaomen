<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form>
		<input type="text" name="g_name" value="{{$g_name}}" placeholder="请输入标题">
		<input type="submit" value="搜索">
	</form>
<table border>
	<tr>
		<td>商品ID</td>
		<td>商品名称</td>
		<td>商品货号</td>
		<td>商品价格</td>
		<td>商品图片</td>
		<td>商品库存</td>
		<td>是否精品</td>
		<td>是否热销</td>
		<td>商品详情</td>
		<td>商品相册</td>
		<td>操作</td>
	</tr>
	@foreach($data as $k=>$v)
	<tr>
		<td>{{$v->g_id}}</td>
		<td>{{$v->g_name}}</td>
		<td>{{$v->g_huohao}}</td>
		<td>{{$v->g_price}}</td>
		<td>@if($v->g_img)<img src="{{env('UPLODA_URL')}}{{$v->g_img}}" width="30" height="30">@endif</td>
		<td>{{$v->g_kucun}}</td>
		<td>{{$v->g_jingpin==1?'是':'否'}}</td>
		<td>{{$v->g_rexiao==1?'是':'否'}}</td>
		<td>{{$v->g_xiangqing}}</td>
		<td></td>
		<td>
			<a href="{{url('goods/edit/'.$v->g_id)}}">编辑</a>
			<a href="{{url('goods/destroy/'.$v->g_id)}}">删除</a>
		</td>
	</tr>
	@endforeach
</table>
<tr><td clospan="3">{{$data->appends(['g_name'=>$g_name])->links()}}</td></tr>
</body>
</html>