@extends('welcome')
@section('content')
@if(count($post))
        <fieldset>
            <legend style="background-color: gray">Post Info </legend>
         <h5>Tille :{{ $post->title }}</h5>
         <p> Description:{{ $post->body }}</p>
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