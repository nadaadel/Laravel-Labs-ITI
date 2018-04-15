@extends('welcome')

@section('content')
@if(count($task))
        <h1>{{ $task->body }}</h1>
        <hr>
        @foreach($task->comments as $comment)
        <div class="comments">
        <article>{{ $comment->body }}</article>   
        </div>
        @endforeach
      

        <form method="POST" action="/tasks/{{$task->id}}/comment">
        {{ csrf_field() }}
        <textarea name="body" placeholder="Your Comment Here !">
               
           </textarea>
           <input type="submit" value="Comment">
        </form>
    @endif 
@endsection