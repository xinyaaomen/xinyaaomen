<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="{{url('/jiafang/store')}}" enctype="multipart/form-data">
	@csrf
	<table border>
		<tr>
			<td>用户名:</td>
			<td><input type="text" name="j_name"></td>
		</tr>
		<tr>
			<td>账户密码:</td>
			<td><input type="password" name="j_password"></td>
		</tr>
		<tr>
			<td>确认密码:</td>
			<td><input type="password" name="j_qrmm"></td>
		</tr>
		<tr>
			<td>手机号:</td>
			<td><input type="text" name="j_tel"></td>
		</tr>
		<tr>
			<td>邮箱:</td>
			<td><input type="text" name="j_email"></td>
		</tr>
		<tr>
			<td>用户头像:</td>
			<td><input type="file" name="j_img"></td>
		</tr>
		<tr>
			<td><input type="submit" value="注册"></td>
			<td></td>
		</tr>
	</table>
</form>
</body>
</html>