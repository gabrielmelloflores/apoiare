    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf

            <header class="flex items-center">
                @if(Auth::user())
                    <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" width="30" height="30" class="rounded-full">
                @else
                    <img src="{{url('images/avatar.png')}}" alt="" width="40" height="40" class="rounded-xl">
                @endif
                    <h2 class="ml-4">Quer participar?</h2>
            </header>

            <div class="mt-6">
                @guest
                    <input class="border w-full focus:outline-none focus:ring mb-4 rounded p-1"
                           name="name"
                           id="name"
                           placeholder="Nos diga o seu nome!"
                    >
                    @error('name')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                @endguest
            <textarea
                name="body"
                class="border w-full text-sm focus:outline-none focus:ring rounded p-1"
                rows="5"
                placeholder="Rápido, pense em algo para dizer!"
                required></textarea>

                @error('body')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <x-form.button>Submit</x-form.button>
        </form>
    </x-panel>
