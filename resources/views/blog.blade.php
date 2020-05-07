@extends('layouts.base', [
    'title' => 'Blog',
    'metaDescription' => 'Here on my blog I try to write about various things which keep me busy. There\'s lots of posts on various tech related topics but I also sometimes blog about sports, books, movies and other things.',
])

@section('body')
    @component('layouts.header')
        <h1 class="text-5xl text-center sm:text-left font-bold mb-4">
            Blog
        </h1>

        <p class="mb-4">
            Here on my blog I try to write about various things which keep me busy. There's lots of posts on various tech related topics but I also sometimes blog about <a href="{{ route('post', 'one-club-player') }}">sports</a>, <a href="{{ route('post', '1984') }}">books</a>, <a href="{{ route('post', 'star-wars-the-last-jedi-review') }}">movies</a> and other things.
        </p>

        <p class="mb-4">
            My blog post about <a href="{{ route('post', 'getting-started-with-dotfiles') }}">getting started with dotfiles</a> is a good start if you are interested to backup your local development environment on your Mac.
        </p>

        <p>
            <a href="{{ route('feeds.main') }}">RSS Feed <i class="enlarge fas fa-rss ml-1"></i></a>
        </p>
    @endcomponent

    <div id="content" class="max-w-3xl mx-auto px-6 py-10 sm:py-20">
        <h3 class="mb-4 font-bold">{{ $year = $posts->first()->published_at->format('Y') }}</h3>
            @foreach ($posts as $post)
                @if ($post->published_at->format('Y') !== $year)
                    @php($year = $post->published_at->format('Y'))
        <h3 class="mt-8 mb-4 font-bold">{{ $year }}</h3>
                @endif
        <span class="block text-xs uppercase text-gray-600">
            {{ $post->published_at->format('F j, Y') }}
        </span>
        <p class="text-2xl mb-8">
            <a href="{{ route('post', $post) }}">{{ $post->title }}</a>
        </p>
            @endforeach
    </div>
@endsection
