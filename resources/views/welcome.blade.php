<x-app-layout>
{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
    <div>
        <div>
            <div style="background-color: #F0CED9" class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
{{--                <x-jet-welcome />--}}
                @include('vendor.jetstream.components.welcome')
            </div>
        </div>
    </div>
    <x-slot name="footer">
        @include ('layouts.footer')
    </x-slot>
</x-app-layout>
