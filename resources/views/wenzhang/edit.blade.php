<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="/static/js/jquery.min.js"></script>
</head>
<body>
<form method="post" action="{{url('/wenzhang/update/'.$user->w_id)}}" enctype="multipart/form-data">
	@csrf
	<table border="1">
		<tr>
			<td>文章标题</td>
			<td><input type="text" name="w_name" value="{{$user->w_name}}"></td>
		</tr>
		<tr>
			<td>文章分类</td>
			<td><input type="text" name="w_fenlei" value="{{$user->w_fenlei}}"></td>
		</tr>
		<tr>
			<td>文章重要性</td>
			<td>
			<input type="radio" name="w_zyx" value="1" @if($user->w_zyx==1) checked @endif>普通

			<input type="radio" name="w_zyx" value="2" @if($user->w_zyx==2) checked @endif>置顶</td>
		</tr>
		<tr>
			<td>是否显示</td>
			<td>
			<input type="radio" name="w_sfxs" value="1" @if($user->w_sfxs==1) checked @endif>显示

			<input type="radio" name="w_sfxs" value="2" @if($user->w_sfxs==2) checked @endif>不显示
			</td>
		</tr>
		<tr>
			<td>文章作者</td>
			<td><input type="text" name="w_zuozhe" value="{{$user->w_zuozhe}}"></td>
		</tr>
		<tr>
			<td>作者email</td>
			<td><input type="text" name="w_email" value="{{$user->w_email}}"></td>
		</tr>
		<tr>
			<td>关键字</td>
			<td><input type="text" name="w_gjz" value="{{$user->w_gjz}}"></td>
		</tr>
		<tr>
			<td>网页描述</td>
			<td><input type="text" name="w_miaoshu" value="{{$user->w_miaoshu}}"></td>
		</tr>
		<tr>
			<td>上传文件</td>
			
			<td><img src="{{env('UPLODA_URL')}}{{$user->w_wenjian}}" width="50" height="50"><input type="file" name="w_wenjian"></td>
		</tr>
		<tr>
			<td>
				<input type="submit" value="修改">
			</td>
			<td></td>
		</tr>
	</table>
</form>

</body>
</html>