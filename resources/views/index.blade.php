<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="{{url('add')}}" method="post">
	@csrf
	<input type="text" name="name">姓名
	<input type="number" name="age">年龄
	<input type="submit" value="添加">
</form>
</body>
</html>
