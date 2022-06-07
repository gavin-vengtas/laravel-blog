@extends('layout')

@section('content')
    <article>
        <h2>{{ $post->title; }}</h2>
        <p>By <a href="{{$url}}/author/{{$post->author->username}}">{{$post->author->name;}}</a> in <a href="{{$url}}/category/{{$post->category->slug;}}">{{$post->category->name;}}</a></p>
        <p>{{ $post->body; }}</p>
        <a href="{{$url}}/">Go Back</a>
    </article>

    <script src="" async defer></script>
@endsection

        