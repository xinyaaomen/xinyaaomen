<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="{{url('/student/store')}}" method="post" enctype="multipart/form-data">
	@csrf
	<table>
		<tr>
			<td>姓名</td>
			<td><input type="text" name="s_name"><b style="color:red">{{$errors->first('s_name')}}</b></td>
			
		</tr>		
		<tr>
			<td>性别</td>
			<td>
			<input type="radio" name="s_sex" value="1" checked>男
			<input type="radio" name="s_sex" value="2">女
		</td>
		</tr>
		<tr>
			<td>班级</td>
			<td><input type="text" name="s_class"></td>
		</tr>

		<tr>
			<td>成绩</td>
			<td><input type="text" name="s_chengji"><b style="color:red">{{$errors->first('s_chengji')}}</b></td>
			 
		</tr>
		<tr>
			<td>学生照片</td>
			<td><input type="file" name="s_img"></td>
		</tr>
		<tr>
			<td><input type="submit" value="添加"></td>
			<td></td>
		</tr>
	</table>
</form>
</body>
</html>