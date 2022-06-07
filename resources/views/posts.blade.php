@extends('layout')

@section('content')
    @foreach ($posts as $post)
    <article>
        <h2>{{$post->title;}}</h2>
        <p>
            By <a href="{{$url}}/author/{{$post->author->username;}}">{{$post->author->name;}}</a> in <a href="{{$url}}/category/{{$post->category->slug;}}">{{$post->category->name;}}</a>
        </p>
        <p>{{$post->excerpt;}}</p>
        <a href="{{$url}}/post/{{$post->slug;}}">Read More...</a>
    </article>
    @endforeach
@endsection

        