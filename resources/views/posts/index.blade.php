@extends('layouts.app')

@section('content')
    <h1>POSTS</h1>
    @if(count($posts) > 1)
        @foreach($posts as $post)
            <div class="well">
      <h2> <a href="/lsapp/public/posts/{{$post->id}}">  {{$post->title}}</h2>
              <small> Written on {{$post->created_at}} </small>
            </div>
        @endforeach  
    @else
        <p> No Posts found <p>

   @endif

@endsection