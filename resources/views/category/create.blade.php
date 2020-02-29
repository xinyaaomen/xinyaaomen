<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="{{url('/category/store')}}">
	@csrf
	分类名称:<input type="text" name="cate_name"><hr>
	父级分类:<select name="parent_id">
				<option value="0">--请选择--</option>
				@foreach($cate as $v)
				<option value="{{$v->cate_id}}">{{$v->cate_name}}</option>
				@endforeach
			</select><hr>
	分类描述:<textarea name="desc"></textarea><hr>
	<input type="submit" value="添加">
</form>
</body>
</html>