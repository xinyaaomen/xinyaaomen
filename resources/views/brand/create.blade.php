<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>商品添加</h1>
	<hr>
<form method="post" action="{{url('/brand/store')}}" enctype="multipart/form-data">
	@csrf
	<table border>
	<tr>
		<td>商品名称</td>
		<td><input type="text" name="b_name"><b style="color:red">{{$errors->first('b_name')}}</b></td>
	</tr>
		<tr>
		<td>商品logo</td>
		<td>
			<input type="file" name="b_img">
		</td>
	</tr>
		<tr>
		<td>商品网址</td>
		<td><input type="text" name="b_url"></td>
	</tr>
		<tr>
		<td><input type="submit" value="添加"></td>
		<td></td>
	</tr>
	</table>
</form>
</body>
</html>