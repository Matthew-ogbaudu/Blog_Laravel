<x-layout>

    @include('postheader')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())
    <x-posts-grid :posts="$posts"/>

            {{$posts->links()}}
            @else
                <p class="text-center">No posts yet. Please check back later</p>
        @endif

{{--        <div class="lg:grid lg:grid-cols-3">--}}

{{--<x-postcard/>--}}
{{--            <x-postcard/>--}}
{{--            <x-postcard/>--}}

{{--        </div>--}}
    </main>
{{--    <x-slot>--}}

{{--    </x-slot>--}}
{{--    @foreach($posts as $post)--}}
{{--        --}}{{--    laravel gives us access to a loop variable, more info about the loop--}}
{{--        --}}{{--    @dd($loop)--}}
{{--        <article>--}}

{{--            <h1>--}}
{{--                <a href="/posts/{{$post->slug}}">--}}
{{--                    --}}{{--                <?= $post->title;?>--}}
{{--                    --}}{{--            using blade--}}
{{--                    {{$post->title}}--}}

{{--                </a></h1>--}}
{{--            <p>--}}

{{--                <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>--}}
{{--            </p>--}}

{{--            <div>--}}

{{--                --}}{{--    <?= $post->excerpt;?>--}}
{{--                {{$post->excerpt}}--}}
{{--            </div>--}}
{{--        </article>--}}
{{--    @endforeach--}}
</x-layout>
