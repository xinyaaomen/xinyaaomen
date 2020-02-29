<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form  method="post" action="{{url('/kgy/store')}}">
	@csrf
货物添加:<input type="text" name="k_huowu"><hr>
出入库添加:<input type="text" name="k_churuku"><hr>
<input type="submit" value="添加">
</form>
</body>
</html>