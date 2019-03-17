@extends('_layouts.master', ['title' => 'Blog'])

@section('body')
    @include('_partials.navigation')

    <div class="text-center">
        <h1>Blog</h1>
    </div>

    <div class=" max-w-md m-auto">
        <h3 class="mb-4">{{ $year = date('Y', $posts->first()->date) }}</h3>

            @foreach ($posts as $post)
                @if (date('Y', $post->date) !== $year)
                    @php($year = date('Y', $post->date))

        <h3 class="mt-8 mb-4">{{ $year }}</h3>
                @endif
            <span class="block italic text-sm">
                {{ date('F j, Y', $post->date) }}
            </span>
            <p class="text-2xl">
                <a href="{{ $post->getPath() }}">{{ $post->title }}</a>
            </p>
            @endforeach
    </div>
@endsection
