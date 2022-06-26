@extends('components/layout')

@section('content')
<section class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl hover:border-gray-300">
        <h1 class="text-center font-bold text-xl">Login Form</h1>
        <form method="POST" action="/login" class="mt-10">
            @csrf

            <div class="mb-6">
                
                <label 
                    for="email" 
                    class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-3"
                >
                    Email Address
                </label>
                <input 
                    type="email" 
                    class="border border-gray-400 p-2 w-full mb-2 rounded-lg"
                    name="email"
                    id="email"
                    value="{{old('email')}}"
                    required>

                @error('email')
                    <p class="text-red-500 text-xs mb-1">{{$message}}</p>
                @enderror

                <label 
                    for="password" 
                    class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-3"
                >
                        Password
                </label>
                <input 
                    type="password" 
                    class="border border-gray-400 p-2 w-full mb-2 rounded-lg"
                    name="password"
                    id="password"
                    required
                >
                @error('password')
                    <p class="text-red-500 text-xs mb-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button 
                    type="submit"
                    class="bg-blue-400 rounded rounded-lg border-black py-2 px-4 text-white hover:bg-blue-500"    
                >Login</button>
            </div>
        </form>
    </main>
</section>
@endsection
