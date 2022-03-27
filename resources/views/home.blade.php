@extends('layouts.base', [
    'metaDescription' => 'I\'m a software engineer from Antwerp, Belgium, work for Laravel, organise events for Full Stack Belgium and organise the Full Stack Europe conference.',
])

@section('body')
    @component('layouts.header')
        <div class="text-center">
            <h1 class="text-5xl font-bold mb-6">
                Hi, I'm Dries
            </h1>

            <p class="text-2xl sm:text-3xl sm:leading-snug leading-snug mb-8">
                Software engineer at <a href="https://laravel.com">Laravel</a>, <a href="https://fullstackbelgium.be">event</a> & <a href="https://fullstackeurope.com">conference</a> organiser, <a href="https://github.com/driesvints">open-source</a> maintainer, <a href="https://www.youtube.com/watch?v=2yos8WUG5z4">speaker</a>, and <a href="{{ route('blog') }}">blogger</a>.
            </p>

            <p class="mb-8">
                <a href="{{ route('home') }}#about">
                    More about me &rightarrow;
                </a>
            </p>

            <p class="text-xs">
                Photo by <a href="https://ninjaparade.ca">ninjaparade</a>
            </p>
        </div>
    @endcomponent

    <div id="content">
        <div class="max-w-3xl mx-auto px-6 py-10 sm:py-20">
            <h2 class="text-4xl text-center sm:text-left font-bold mb-4 sm:mb-12">Latest Posts</h2>

            <p class="text-base text-center font-bold sm:float-right sm:-mt-20 mb-8">
                <a href="{{ route('blog') }}">View all &rightarrow;</a>
            </p>

            @foreach ($posts as $post)
                <span class="block text-xs uppercase text-gray-500">
                    {{ $post->published_at->format('F j, Y') }}
                </span>
                <p class="text-2xl mb-8">
                    <a href="{{ route('post', $post) }}">{{ $post->title }}</a>
                </p>
            @endforeach
        </div>

        <div id="projects" class="bg-gray-100">
            <div class="max-w-6xl mx-auto px-6 py-10 sm:py-20">
                <h2 class="text-4xl text-center font-bold mb-10">Projects</h2>

                <div class="md:flex mb-12 md:mb-16">
                    <div class="project sm:flex-1 px-4 lg:px-8 mb-8 md:mb-0">
                        <a href="https://fullstackeurope.com" target="_blank" rel="noopener">
                            <div class="bg-white enlarge text-center text-base rounded-lg border-t-6 border-primary shadow-lg h-full px-8 md:px-12 py-8">
                                <div class="h-24 pt-5 mb-6">
                                    <img src="{{ asset('/images/fseu.png') }}" class="inline-block max-h-full" alt="">
                                </div>
                                <p class="mb-6">A conference for every kind of developer</p>
                                <p class="text-sm text-gray-500">fullstackeurope.com <x-fas-external-link-alt class="inline w-3 h-3 mb-1" /></p>
                            </div>
                        </a>
                    </div>
                    <div class="project md:flex-1 px-4 lg:px-8 mb-8 md:mb-0">
                        <a href="https://blade-ui-kit.com" target="_blank" rel="noopener">
                            <div class="bg-white enlarge text-center text-base rounded-lg border-t-6 border-primary shadow-lg h-full px-8 md:px-12 py-8">
                                <div class="h-24 pt-6 mb-6">
                                    <img src="{{ asset('/images/blade-ui-kit.svg') }}" class="inline-block max-h-full" alt="">
                                </div>
                                <p class="mb-6">Renderless components for your Laravel Blade views</p>
                                <p class="text-sm text-gray-500">blade-ui-kit.com <x-fas-external-link-alt class="inline w-3 h-3 mb-1" /></i></p>
                            </div>
                        </a>
                    </div>
                    <div class="project md:flex-1 px-4 lg:px-8">
                        <a href="https://laravel.io" target="_blank" rel="noopener">
                            <div class="bg-white enlarge text-center text-base rounded-lg border-t-6 border-primary shadow-lg h-full px-8 md:px-12 py-8">
                                <div class="h-24 pt-8 mb-6">
                                    <img src="{{ asset('/images/laravelio.png') }}" class="inline-block max-h-full"  alt="">
                                </div>
                                <p class="mb-6">The Laravel community platform</p>
                                <p class="text-sm text-gray-500">laravel.io <x-fas-external-link-alt class="inline w-3 h-3 mb-1" /></p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="text-center">
                    <p class="text-sm sm:text-base text-gray-600 mb-12">
                        + <a href="https://github.com/driesvints/dotfiles">Dotfiles</a>, my preferred way to set up my Mac.<br>
                        + <a href="https://github.com/EventSaucePHP/LaravelEventSauce">Laravel EventSauce</a>, event sourcing for Laravel apps.<br>
                        + <a href="https://fullstackbelgium.be">Full Stack Belgium</a>, events in Belgium for web developers.<br>
                        + <a href="https://github.com/blade-ui-kit/blade-icons">Blade Icons</a>, easily use SVG icons in your Laravel Blade views.<br>
                        + <a href="https://github.com/github-php/sponsors">PHP GitHub Sponsors</a>, a package for PHP to interact with GitHub Sponsors.<br>
                        + <a href="https://github.com/driesvints/vat-calculator">VatCalculator</a>, handle all the hard stuff related to EU MOSS tax/vat regulations.
                    </p>
                </div>
            </div>
        </div>
    </div>

    @include('partials.about')
@endsection
