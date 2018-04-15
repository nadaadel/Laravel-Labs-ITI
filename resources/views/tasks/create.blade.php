<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <form method="POST"  action="/tasks/create">
    {{ csrf_field() }}
    	Body :<input type="text" name="body"><br/>
    	Complete<input type="text" name="complete"><br/>
    	Photo<input type="file" name="photo"><br/>
    	<input type="submit" value="Save" >
    </form>

    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</body>
</html>