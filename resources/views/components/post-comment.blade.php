@props(['comment'])
<article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4 hover:bg-gray-200 hover:border-gray-300">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/80?u={{$comment->id}}" alt="" width="60" height="60">
    </div>

    <div>
        <header>
            <h3 class="font-bold">{{$comment->author->name}}</h3>

            <p class="text-xs">
                Posted
                <time>{{$comment->created_at->format('F j, Y, g:i a')}}</time>
                {{-- <time>{{$comment->created_at->diffForHumans()}}</time> --}}
            </p>

            <p>
                {{$comment->body}}
            </p>
        </header>
    </div>
</article>