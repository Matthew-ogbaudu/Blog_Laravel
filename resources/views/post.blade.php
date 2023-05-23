
{{--SECOND WAY TO CREATE LAYOUT USING BLADE COMPONENT--}}
<x-layout>
    <article>
        <h1>
            {{--            <?= $single->title;?>--}}
            {{$single->title}}

        </h1>
        <div>
            {{--            <?=$single->body; ?>--}}
            {!!$single->body !!}

        </div>

    </article>
    <a href="/">Go back</a>
</x-layout>
