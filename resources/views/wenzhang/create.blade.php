<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="/static/js/jquery.min.js"></script>
</head>
<body>
<form method="post" action="{{url('/wenzhang/store')}}" enctype="multipart/form-data">
	@csrf
	<table border="1">
		<tr>
			<td>文章标题</td>
			<td><input type="text" name="w_name"><b style="color:red">{{$errors->first('w_name')}}</b></td>
		</tr>
		<tr>
			<td>文章分类</td>
			<td><input type="text" name="w_fenlei"></td>
		</tr>
		<tr>
			<td>文章重要性</td>
			<td>
			<input type="radio" name="w_zyx" value="1" checked>普通

			<input type="radio" name="w_zyx" value="2">置顶</td>
		</tr>
		<tr>
			<td>是否显示</td>
			<td>
			<input type="radio" name="w_sfxs" value="1" checked>显示

			<input type="radio" name="w_sfxs" value="2">不显示
			</td>
		</tr>
		<tr>
			<td>文章作者</td>
			<td><input type="text" name="w_zuozhe"><b style="color:red">{{$errors->first('w_zuozhe')}}</b></td>
		</tr>
		<tr>
			<td>作者email</td>
			<td><input type="text" name="w_email"><b style="color:red">{{$errors->first('w_email')}}</b></td>
		</tr>
		<tr>
			<td>关键字</td>
			<td><input type="text" name="w_gjz"><b style="color:red">{{$errors->first('w_gzj')}}</b></td>
		</tr>
		<tr>
			<td>网页描述</td>
			<td><input type="text" name="w_miaoshu"><b style="color:red">{{$errors->first('w_miaoshu')}}</b></td>
		</tr>
		<tr>
			<td>上传文件</td>
			<td><input type="file" name="w_wenjian"></td>
		</tr>
		<tr>
			<td>
				<input type="button" value="添加">
			</td>
			<td></td>
		</tr>
	</table>
</form>
<script>
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

</script>
</body>
</html>