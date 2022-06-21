@props(['trigger'])

<div x-data="{ show: false }" @click.away="show = false">

    {{-- trigger --}}
    <div x-data="{ show = !show }">
        {{ $trigger}}
    </div>

    {{-- dropdown links --}}
    <div x-show="show" class="py-2 absolute bg-gray-100 mt-2 w-full rounded-xl z-50" style="display: none; max-height: 300px; overflow: auto;">
        {{ $slot }}
        
    </div>
</div>