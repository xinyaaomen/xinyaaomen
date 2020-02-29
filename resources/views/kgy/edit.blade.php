<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form  method="post" action="{{url('/kgy/update/'.$user->k_id)}}">
	@csrf
货物添加:<input type="text" name="k_huowu" value="{{$user->k_huowu}}"><hr>
出入库添加:<input type="text" name="k_churuku"  value="{{$user->k_churuku}}"><hr>
<input type="submit" value="修改">
</form>
</body>
</html>