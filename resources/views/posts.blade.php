@extends('layout')

@section('content')
    @foreach ($post as $item)
    <article>
        <h2>{{$item->title;}}</h2>
        <p>{{$item->excerpt;}}</p>
        <a href="posts/{{$item->name;}}">Read More...</a>
    </article>
    @endforeach
@endsection

        