@extends('_layouts.master', ['title' => 'Blog'])

@section('body')
    <div class="relative bg-black bg-cover bg-no-repeat" style="min-height: 650px; background-image: url('/assets/images/header.jpg'); background-position: 20% 10%">
        <div class="bg-black-opacity-75 md:bg-transparent" style="min-height: 650px;">
            <div class="max-w-6xl mx-auto text-white py-6 pb-24">
                <div class="text-center sm:text-right">
                    @include('_partials.social')
                </div>

                <div id="bio" class="sm:max-w-lg mx-auto text-shadow-lg font-semibold px-6 mt-16 md:mr-10 lg:mr-16">
                    <h1 class="text-5xl text-center sm:text-left font-bold mb-4">
                        Blog
                    </h1>

                    <p class="mb-4">
                        Here on my blog I try to write about various things which keeps me busy. There's lots of posts on various tech related topics but I also sometimes blog about <a href="/blog/one-club-player">sports</a>, <a href="/blog/1984">books</a>, <a href="/blog/star-wars-the-last-jedi-review">movies</a> and other things.
                    </p>

                    <p class="mb-4">
                        My blog post about <a href="/blog/getting-started-with-dotfiles">getting started with dotfiles</a> is one which you would want to give a read if you are interested to backup your local development environment on your Mac.
                    </p>

                    <p>
                        <a href="/blog/feed.atom">RSS Feed <i class="enlarge fas fa-rss ml-1"></i></a>
                    </p>
                </div>
            </div>
            <svg class="absolute z-0 left-0 bottom-0 block w-full h-8 sm:h-24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                <polygon fill="#f7fafc" points="0,100 100,0 100,100"/>
            </svg>
        </div>
    </div>

    <div id="content" class="max-w-2xl mx-auto px-6 py-10 sm:py-20">
        <h3 class="mb-4 font-bold">{{ $year = date('Y', $posts->first()->date) }}</h3>
            @foreach ($posts as $post)
                @if (date('Y', $post->date) !== $year)
                    @php($year = date('Y', $post->date))
        <h3 class="mt-8 mb-4 font-bold">{{ $year }}</h3>
                @endif
        <span class="block text-xs uppercase text-gray-600">
            {{ date('F j, Y', $post->date) }}
        </span>
        <p class="text-2xl mb-8">
            <a href="{{ $post->getPath() }}">{{ $post->title }}</a>
        </p>
            @endforeach
    </div>
@endsection
