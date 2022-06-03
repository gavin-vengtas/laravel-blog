@extends('layout')

@section('content')
    @foreach ($post as $item)
    <article>
        <h2>{{$item->title;}}</h2>
        <p><a href="">{{$item->category->name;}}</a></p>
        <p>{{$item->excerpt;}}</p>
        <a href="posts/{{$item->slug;}}">Read More...</a>
    </article>
    @endforeach
@endsection

        