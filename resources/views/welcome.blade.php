<x-layout>
    <x-slot>

    </x-slot>
    @foreach($posts as $post)
        {{--    laravel gives us access to a loop variable, more info about the loop--}}
        {{--    @dd($loop)--}}
        <article>

            <h1>
                <a href="/posts/{{$post->slug}}">
                    {{--                <?= $post->title;?>--}}
                    {{--            using blade--}}
                    {{$post->title}}

                </a></h1>

            <div>

                {{--    <?= $post->excerpt;?>--}}
                {{$post->excerpt}}
            </div>
        </article>
    @endforeach
</x-layout>
