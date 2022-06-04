@extends('layout')

@section('content')
    <article>
        <h2>{{ $post->title; }}</h2>
        <p>By <a href="">{{$post->user->name;}}</a> in <a href="/categories">{{$post->category->name;}}</a></p>
        <p>{{ $post->body; }}</p>
        <a href="/">Go Back</a>
    </article>

    <script src="" async defer></script>
@endsection

        