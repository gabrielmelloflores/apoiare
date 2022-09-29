<x-app-layout>

{{--    @foreach ($posts as $post)--}}
{{--        <article>--}}
{{--            <h1>--}}
               {{-- <a href="/posts/<?= $post->slug; ?>"> --}}
{{--                    {{ $post->title }}--}}
{{--                </a>--}}
{{--            </h1>--}}

{{--            <p>--}}
{{--                By <a href="/authors/{{ $post->author->username }}"> {{$post->author->name}} </a> in <a href="/categories/{{ $post->category->slug }}"> {{ $post->category->name }}</a>--}}
{{--            </p>--}}

{{--            <div>--}}
{{--                {!! $post->excerpt !!}--}}
{{--            </div>--}}
{{--        </article>--}}
{{--    @endforeach--}}
    <x-slot name="header">
    @include ('posts._header')
    </x-slot>
        <section class="lg:px-20 py-8 px-6">

            @if($posts->count())
            <x-posts-grid :posts="$posts"></x-posts-grid>

            {{ $posts->links() }} {{--PAGINATION--}}

            @else
                <p class="text-center" >Sem publicações no momento. Verifique novamente mais tarde.</p>
            @endif
        </section>
    <x-slot name="footer">
        @include ('layouts.footer')
    </x-slot>
{{--        <div class="lg:grid lg:grid-cols-3">--}}

{{--            <x-post-card/>--}}
{{--            <x-post-card/>--}}
{{--            <x-post-card/>--}}

{{--        </div>--}}
</x-app-layout>
