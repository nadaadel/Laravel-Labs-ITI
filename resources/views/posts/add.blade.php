@extends('welcome')
@section('content')
  <div class="container">
    <form action="/post/store" method="post" class="form-control"  enctype="multipart/form-data">
    @csrf   
     <label >Title</label> <br>
      <input class="form-control" type="text" name="title" id="title"> <br>
      <label > Add Photo</label>
      <input type="file" name="image" id="image"><br> Extention only (.jpg, .png)
     <label>Description</label> <br>
      <textarea class="form-control" cols="30" rows="10"  name="body"></textarea><br>
      <input class="btn btn-primary" type="submit" value="Add New Post">
    </form>
</div>
<div>
   @foreach ($errors->all() as $error )
   <li>{{ $error }}</li>
   @endforeach
</div>
@endsection