@extends('layouts.base', [
    'metaDescription' => 'I\'m a software engineer from Antwerp, Belgium, work for Laravel and built projects like Eventy and Laravel.io',
])

@section('body')
    @component('layouts.header')
        <div class="text-center">
            <h1 class="text-5xl font-bold mb-6">
                Hi, I'm Dries
            </h1>

            <p class="text-2xl sm:text-3xl sm:leading-snug leading-snug mb-8">
                Software engineer at <a href="https://laravel.com">Laravel</a>, <span class="whitespace-nowrap">co-creator</span> of <a href="https://eventy.io">Eventy</a>, and maintainer of <a href="https://laravel.io">Laravel.io</a>
            </p>

            <p class="text-xs">
                Photo by <a href="https://x.com/ninjaparade">Yaz Jallad</a>
            </p>
        </div>
    @endcomponent

    <div id="content">
        <div id="projects" style="background-color: #f7fafc">
            <div class="max-w-5xl mx-auto px-6 py-10 sm:py-20">
                <h2 class="text-4xl text-center font-bold mb-10">Projects</h2>

                <div class="md:flex mt-12 mb-12 md:mb-16">
                    <div class="project sm:flex-1 px-4 lg:px-8 mb-8 md:mb-0">
                        <a href="https://eventy.io" target="_blank" rel="noopener">
                            <div class="bg-white enlarge text-center text-base rounded-lg border-t-6 border-primary shadow-lg h-full px-8 md:px-12 py-8">
                                <div class="h-24 pt-5 mb-6">
                                    <img src="{{ asset('/images/eventy.svg') }}" class="inline-block max-h-full" alt="">
                                </div>
                                <p class="mb-6">The event platform<br>for the rest of us</p>
                                <p class="text-sm text-gray-500">eventy.io <x-fas-external-link-alt class="inline w-3 h-3 mb-1" /></p>
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
                        + <a href="https://github.com/blade-ui-kit/blade-icons">Blade Icons</a>, easily use SVG icons in your Laravel Blade views.<br>
                    </p>
                </div>
            </div>
        </div>
    </div>

    @include('partials.about')
@endsection
