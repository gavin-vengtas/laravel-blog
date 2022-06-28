@auth
<form method="POST" action="/post/{{$post->slug}}/comments" class="border border-gray-200 p-6 rounded-xl">
    @csrf
    
    <header class="space-x-3">
        <img src="https://i.pravatar.cc/80?u={{auth()->user()->id}}" alt="" width="60" height="60" class="rounded-xl inline-block">
        <h2 class="inline-block">Want to participate?</h2>
    </header>

    <div class="my-5">
        <textarea 
            name="body" 
            class="block rounded-xl w-full border border-gray-100"
            placeholder="  
What would you like to say?"
            id="" 
            cols="30" 
            rows="10"
            required></textarea>
        
        @error('body')
            <p class="text-red-500 text-xs mb-1 mt-2">{{$message}}</p>
        @enderror
    </div>

    <div class="flex justify-end border-gray-200">
        <button 
            type="submit"
            class="bg-blue-400 rounded rounded-lg border-black py-2 px-4 text-white hover:bg-blue-500"
        >Post</button>
    </div>
</form>
@else    
<div class="text-center border border-gray-200 p-6 rounded-xl">
    <p><a href="/register" class="text-blue-400 hover:underline">Register</a> or <a href="/login" class="text-blue-400 hover:underline">Login</a> to comment</p>
</div>
@endauth