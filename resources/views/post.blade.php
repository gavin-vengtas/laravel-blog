@extends('layout')

@section('content')
    <article>
        <h2>{{ $post->title; }}</h2>
        <p>By <a href="{{$url}}/author/{{$post->author->id}}">{{$post->author->name;}}</a> in <a href="{{$url}}/category/{{$post->category->id;}}">{{$post->category->name;}}</a></p>
        <p>{{ $post->body; }}</p>
        <a href="{{$url}}/">Go Back</a>
    </article>

    <script src="" async defer></script>
@endsection

        