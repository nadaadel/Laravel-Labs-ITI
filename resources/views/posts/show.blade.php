@extends('welcome')
@section('content')
@if(count($post))
        <fieldset>
            <legend style="background-color: gray">Post Info </legend>
         <h5>Tille :{{ $post->title }}</h5>
         <p> Description:{{ $post->body }}</p>
         <img src=" {{ Storage::url($post->image) }}" alt="Post-Image">
        
         <legend style="background-color: gray">Comments </legend>         
         @foreach ($comments as $comment )
         <div style="background-color:lightgrey">
              {{$comment->user->name}} : {{$comment->body}}
         </div> 
         @endforeach
        <form action="/post/comments/create/{{$post->id}}" method="post">
            @csrf
         <textarea name="body" id="body" cols="30" rows="3"></textarea>
         <input class="btn btn-success"type="submit" value="Comment">
        </form>
        <hr> 
    </fieldset>
    <fieldset>
        <legend style="background-color: gray">Post Creator Info </legend>
        <p>Name : {{ $post->user->name }}</p>
        <p> Email:{{ $post->user->email }}</p>
        <p> Created At :{{ $post->created_at }}</p>
    <hr> 
</fieldset>
    @endif 
@endsection