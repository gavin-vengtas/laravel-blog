<div>
    <!-- Well begun is half done. - Aristotle -->
    <x-dropdown>
        <x-slot name="trigger">
            <button @click="show = !show" 
                    class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex"
            >
                {{ucwords($currentCategory->name)}}
                <x-icon :name="'down-arrow'" class="absolute pointer-events-none" style="right: 12px;" />

            </button>
        </x-slot>

        <x-dropdown-item href="/?{{http_build_query(request()->except('category','page'))}}" :active="request('category')==null">All</x-dropdown-item>
        @foreach ($categories as $category)
            <x-dropdown-item 
                href="{{ route('home') }}/?category={{ $category->slug }}&{{ http_build_query(request()->except('category','page')) }}"
                :active="isset($currentCategory) && $currentCategory->id == $category->id"
            >{{ucwords($category->name);}}</x-dropdown-item>
        @endforeach
    </x-dropdown>
</div>