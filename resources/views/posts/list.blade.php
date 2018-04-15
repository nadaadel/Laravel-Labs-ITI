@extends('welcome')
@section('content')  
  <div class="container">
      <h1 >Welcome to Home</h1>
      <div style="text-align: -webkit-center;">
        <form action="/post/create" method="GET">
          <input  class="btn btn-success text-center" type="submit" value="Create Post">
      </form>
      </div>
  <table class="table table-striped">
    <thead>
      <tr>
       <th>id</th>        
        <th>Title</th>
        <th>Slug</th>        
        <th>Posted By</th>
        <th>Created  At</th>        
        <th>Action</th>
      </tr>
    </thead>
    @foreach($posts as $post)
    <tbody>
      <tr>
        <td id="pid">{{$post->id}}</td>        
        <td><a href="/post/{{$post->id}}"> {{$post->title}} </a></td>
        <td> {{$post->slug}} </td>        
        <td>{{$post->user->name}}</td>
        <td>{{$post->created_at->format('Y-m-d') }}</td>
        <td> <form action="/post/{{$post->id}}" method="get">
          @csrf
          <input class="btn btn-primary"type="submit" value="View">
         </form>
         </td>
        <td> <form action="/post/edit/{{$post->id}}" method="get">
           @csrf
           <input class="btn btn-success"type="submit" value="Edit">
          </form>
          </td>
          <td><form action="/post/delete/{{$post->id}}" method="post" >
           @csrf
           {{method_field('DELETE')}}
           <button id="delete" onClick="return confirm('Are You Sure to Delete Post ?');" 
           class="btn btn-danger" >Delete</button>
          </form>
          </td>
      </tr>
    </tbody>
    @endforeach
  </table>
  <div style="text-align: -webkit-center;" class="pagination" > 
      {{ $posts->links()}}
    </div>
</div>

     <script>
       myfunc = function(){
      result =confirm("Are You Sure to Delete Post ?");
       if(result){
        return true;
       } 
      }

      // $("#pid").click(function(){
      //  result =confirm("Are You Sure to Delete Post ?");
      // if(result){
      //    console.log('yes a baba :D');
      //  } 

      // })
   
    </script>
@endsection
