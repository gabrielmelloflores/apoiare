@props(['heading'])

    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{ $heading }}
    </h1>
<!-- This example requires Tailwind CSS v2.0+ -->
<nav class="bg-blue-300">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'bg-blue-700 text-white px-3 py-2 rounded-md text-sm font-medium' : 'hover:bg-blue-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium' }}">All Posts</a>
                        <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'bg-blue-700 text-white px-3 py-2 rounded-md text-sm font-medium' : 'hover:bg-blue-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium' }}">New Post</a>

{{--                        <a href="#" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Dashboard</a>--}}

{{--                        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Calendar</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Dashboard</a>

            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Team</a>

            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Projects</a>

            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a>
        </div>
    </div>
</nav>
    <div class="flex">

{{--        <aside class="w-48 flex-shrink-0">--}}
{{--            <h4 class="font-semibold mb-4">Links</h4>--}}

{{--            <ul>--}}
{{--                <li>--}}
{{--                    <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">All Posts</a>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">New Post</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </aside>--}}

        <main class="flex-1 bg-gray-100">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
