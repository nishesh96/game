
@extends('layouts.app')

@section('content')
   
    <a href="/lsapp/public/posts/" class="btn btn-default">Go Back</a>

    <h1>{{$post->title}}</h1>

    <div>

    <small>{{$post->body}} </small>

    </div>
@endsection



