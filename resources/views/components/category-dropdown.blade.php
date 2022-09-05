<x-dropdown>
    <x-slot name="trigger">
        <button class=" py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left lg:inline-flex">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categorias' }}

            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"></x-icon>
        </button>
    </x-slot>

    <x-dropdown-item href="/dashboard{{ http_build_query(request()->except('category', 'page')) }}"
        :active="request()->routeIs('home')">All
    </x-dropdown-item>

    @foreach ($categories as $category)
        <x-dropdown-item
            href="/dashboard?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
            :active="request()->is('categories/' . $category->slug)"
{{--            :active=" isset($currentCategory) && $currentCategory->is($category)"--}}
        >{{ ucwords($category->name) }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>
