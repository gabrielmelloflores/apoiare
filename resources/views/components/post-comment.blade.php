@props(['comment'])

<x-panel class="bg-gray-50">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            @if(Auth::user())
                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" width="60" height="60" class="rounded-xl">
            @else
                <img src="{{ $comment->author->profile_photo_url }}" alt="" width="60" height="60" class="rounded-xl">
            @endif
        </div>

        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{ $comment->author->username }}</h3>
                <p class="text-xs">
                    Posted
                    <time>{{ $comment->created_at->format('F j, Y, g:i a') }}</time>
                </p>
            </header>

            <p>
                {{ $comment->body }}
            </p>
        </div>
    </article>
</x-panel>
