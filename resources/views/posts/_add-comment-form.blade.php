{{--@auth--}}
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf

            <header class="flex items-center">
                @if(Auth::user())
                    <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" width="30" height="30" class="rounded-full">
                @else
                    <img src="{{url('images/avatar.png')}}" alt="" width="40" height="40" class="rounded-xl">
                @endif
                    <h2 class="ml-4">Want to participate?</h2>
            </header>

            <div class="mt-6">
            <textarea
                name="body"
                class="border w-full text-sm focus:outline-none focus:ring"
                rows="5"
                placeholder="Quick, think of something to say!"
                required></textarea>

                @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <x-form.button>Submit</x-form.button>
        </form>
    </x-panel>
{{--@else--}}
{{--    <p class="font-semibold">--}}
{{--        <a href="/register" class="hover:underline">Register</a>--}}
{{--        or--}}
{{--        <a href="/login" class="hover:underline">Log in</a>--}}
{{--        to leave a comment--}}
{{--    </p>--}}
{{--@endauth--}}
