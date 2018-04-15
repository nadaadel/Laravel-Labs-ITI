@extends('welcome')
@section('content')
  <div class="container">
    <form action="/post/edit/{{$post->id}}" method="post" class="form-control">
    @csrf    
    <label >Title</label> <br>
      <input class="form-control" type="text" name="title" id="title" value="{{$post->title}}"><br>
      <label >Description</label> <br>
      <input  class="form-control" type="text" name="body" id="body" value="{{$post->body}}"><br>
      <input class="btn btn-primary" type="submit" value="Update Post">
    </form>
  </div>
  @foreach ($errors->all() as $error )
   <li>{{ $error }}</li>
   @endforeach
  @endsection