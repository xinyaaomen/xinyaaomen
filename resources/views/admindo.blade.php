<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="{{route('do')}}">
	@csrf
	<input type="name" name="name">姓名
	<input type="password" name="pwd">密码
	<input type="submit" value="添加">
</form>
</body>
</html>