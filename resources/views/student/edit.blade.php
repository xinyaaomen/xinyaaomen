<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="{{url('/student/update/'.$data->s_id)}}" method="post" enctype="multipart/form-data">
	@csrf
	<table>
		<tr>
			<td>姓名</td>
			<td><input type="text" name="s_name" value="{{$data->s_name}}"><b style="color:red">{{$errors->first('s_name')}}</b></td>
		</tr>		
		<tr>
			<td>性别</td>
			<td>
			<input type="radio" name="s_sex"   value="1" @if($data->s_sex==1) checked @endif checked>男
			<input type="radio" name="s_sex"   value="2" @if($data->s_sex==2) checked @endif>女
		</td>
		</tr>
		<tr>
			<td>班级</td>
			<td><input type="text" name="s_class" value="{{$data->s_class}}"></td>
		</tr>

		<tr>
			<td>成绩</td>
			<td><input type="text" name="s_chengji" value="{{$data->s_chengji}}"><b style="color:red">{{$errors->first('s_chengji')}}</b></td>
		</tr>
		<tr>
			<td>照片</td>
			<td>
			<img src="{{env('UPLODA_URL')}}{{$data->s_img}}" width="50" height="50">
			<input type="file" name="s_img">
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