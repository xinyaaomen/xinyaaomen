<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="{{url('/jiafang/update/'.$user->j_id)}}" enctype="multipart/form-data">
	@csrf
	<table border>
		<tr>
			<td>用户名:</td>
			<td><input type="text" name="j_name" value="{{$user->j_name}}"></td>
		</tr>
		<tr>
			<td>手机号:</td>
			<td><input type="text" name="j_tel" value="{{$user->j_tel}}"></td>
		</tr>
		<tr>
			<td>邮箱:</td>
			<td><input type="text" name="j_email" value="{{$user->j_email}}"></td>
		</tr>
		<tr>
			<td>用户头像:</td>
			<td>
				<img src="{{env('UPLODA_URL')}}{{$user->j_img}}" width="50" height="50">
				<input type="file" name="j_img">
			</td>
		</tr>
		<tr>
			<td><input type="submit" value="修改"></td>
			<td></td>
		</tr>
	</table>
</form>
</body>
</html>