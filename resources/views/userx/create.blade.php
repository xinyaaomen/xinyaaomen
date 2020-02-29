<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form  method="post" action="{{url('/userx/store')}}">
	@csrf
	用户名字:<input type="text" name="u_name"><hr>
	用户身份:&nbsp;&nbsp;库管员:<input type="radio" name="u_shenfen" value="1" checked >&nbsp;&nbsp;&nbsp;&nbsp;主管:<input type="radio" name="u_shenfen" value="2"><hr>
	<input type="submit" value="添加">
</form>
</body>
</html>