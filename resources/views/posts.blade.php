@extends('layout')

@section('content')
    @foreach ($posts as $post)
    <article>
        <h2>{{$post->title;}}</h2>
        <p>
            By <a href="{{$url}}/author/{{$post->author->id;}}">{{$post->author->name;}}</a> in <a href="{{$url}}/category/{{$post->category->id;}}">{{$post->category->name;}}</a>
        </p>
        <p>{{$post->excerpt;}}</p>
        <a href="{{$url}}/posts/{{$post->slug;}}">Read More...</a>
    </article>
    @endforeach
@endsection

        