<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- <script src="/static/js/jquery.min.js"></script> -->
</head>
<body>
<form method="post" action="{{url('/goods/store')}}" enctype="multipart/form-data">
	@csrf
	<table border="1">
		<tr>
			<td>商品名</td>
			<td><input type="text" name="g_name"><b style="color:red">{{$errors->first('w_name')}}</b></td>
		</tr>
		<tr>
			<td>商品货号</td>
			<td><input type="text" name="g_huohao"></td>
		</tr>
		<tr>
			<td>商品价格</td>
			<td><input type="text" name="g_price"></td>
		</tr>
		<tr>
			<td>商品照片</td>
			<td><input type="file" name="g_img"></td>
		</tr>
		<tr>
			<td>商品库存</td>
			<td><input type="text" name="g_kucun"></td>
		</tr>
		<tr>
			<td>是否精品</td>
			<td>
			<input type="radio" name="g_jingpin" value="1" checked>是

			<input type="radio" name="g_jingpin" value="2">否</td>
		</tr>
		<tr>
			<td>是否热销</td>
			<td>
			<input type="radio" name="g_rexiao" value="1" checked>是

			<input type="radio" name="g_rexiao" value="2">否
			</td>
		</tr>
		<tr>
			<td>商品详情</td>
			<td><input type="text" name="g_xiangqing"><b style="color:red">{{$errors->first('w_miaoshu')}}</b></td>
		</tr>
		<tr>
			<td>
				<input type="submit" value="添加">
			</td>
			<td></td>
		</tr>
	</table>
</form>
<!-- <script>
$('input[type="button"]').click(function(){
	var w_nameflag = true;
	$('input[name="w_name"]').next().html('');
	//标题验证
	var w_name = $('input[name="w_name"]').val();
	var reg = /^[\u4e00-\u9fa50-9A-Za-z_]+$/;
	if(!reg.test(w_name)){
		$('input[name="w_name"]').next().html('文章标题由中文字母数字组成且不能为空');
		return;
	}
	//验证唯一性
	$.ajax({
		type:'get',
		url:"checkOnly",
		data:{w_name:w_name},
		async:false,
		dataType:'json',
		success:function(result){
			if(result.count>0){
				//alert(123);
				$('input[name="w_name"]').next().html('标题已存在');
				w_nameflag = false;
			}
			}}); 
	if(!w_nameflag){
		return;
	}
	//作者验证
	var w_zuozhe = $('input[name="w_zuozhe"]').val();
	//alert(w_zuozhe);
	var reg = /^[\u4e00-\u9fa50-9A-Za-z_]{2,8}$/;
	//alert(reg.test(w_zuozhe));
	if(!reg.test(w_zuozhe)){
		$('input[name="w_zuozhe"]').next().html('作者由中文字母下划线组成且不为空 长度为2-8位');
		return;
	}
	//form表单的提交
	$('form').submit();
});

$('input[name="w_zuozhe"]').blur(function(){
	$(this).next().html('');
	var w_zuozhe = $(this).val();
	//alert(w_zuozhe);
	var reg = /^[\u4e00-\u9fa50-9A-Za-z_]{2,8}$/;
	//alert(reg.test(w_zuozhe));
	if(!reg.test(w_zuozhe)){
		$(this).next().html('作者由中文字母下划线组成且不为空 长度为2-8位');
		return;
	}
})

$('input[name="w_name"]').blur(function(){
	$(this).next().html('');
	var w_name = $(this).val();
	var reg = /^[\u4e00-\u9fa50-9A-Za-z_]+$/;
	if(!reg.test(w_name)){
		$(this).next().html('文章标题由中文字母数字组成且不能为空');
		return;
	}
	//验证唯一性
	$.ajax({
		type:'get',
		url:"checkOnly",
		data:{w_name:w_name},
		dataType:'json',
		success:function(result){
			if(result.count>0){
				$('input[name="w_name"]').next().html('标题已存在');
			}
			}}); 
})

</script> -->
</body>
</html>