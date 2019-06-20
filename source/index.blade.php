@extends('_layouts.master', [
    'metaDescription' => 'I\'m a software engineer from Antwerp, Belgium, work for Laravel and organise Full Stack Belgium and Full Stack Europe.',
])

@section('body')
    <div class="relative bg-black bg-cover bg-no-repeat" style="min-height: 650px; background-image: url('/assets/images/header.jpg'); background-position: 20% 10%">
        <div class="bg-black-opacity-75 md:bg-transparent" style="min-height: 650px;">
            <div class="max-w-6xl mx-auto text-white py-6 pb-24">
                @include('_partials.social')

                <div id="bio" class="sm:max-w-lg mx-auto text-shadow-lg font-semibold px-6 mt-16 md:mr-10 lg:mr-16">
                    <h1 class="text-5xl text-center sm:text-left font-bold mb-4">
                        Hi, I'm Dries
                    </h1>

                    <p class="mb-4">
                        I'm a software engineer from Antwerp, Belgium and one of the core team members of <a href="https://laravel.com">Laravel</a>, the popular PHP framework.
                    </p>

                    <p class="mb-4">My passions are open source, building communities, managing software teams and creating quality and maintainable products.
                    </p>

                    <p>
                        I also organize meetups for <a href="https://fullstackbelgium.be">Full Stack Belgium</a> in the cities of <a href="https://meetup.com/fullstackantwerp">Antwerp</a> and <a href="https://meetup.com/fullstackghent">Ghent</a>. And I'm the co-organizer of <a href="https://fullstackeurope.com">Full Stack Europe</a>, a conference for every kind of developer.
                    </p>
                </div>
            </div>
            <svg class="absolute z-0 left-0 bottom-0 block w-full h-8 sm:h-24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                <polygon fill="#edf2f7" points="0,100 100,0 100,100"/>
            </svg>
        </div>
    </div>

    <div id="content" class="max-w-xl mx-auto px-6 py-10 sm:py-20">
        <h2 class="text-4xl text-center sm:text-left font-bold sm:mb-10">Latest Posts</h2>

        <p class="text-base text-center font-bold sm:float-right mt-4 sm:-mt-20 mb-8">
            <a href="/blog">View All &raquo;</a>
        </p>

        @foreach($posts->take(5) as $post)
            <span class="block italic text-sm uppercase text-gray-600">
                {{ date('F j, Y', $post->date) }}
            </span>
            <p class="text-xl mb-8">
                <a href="{{ $post->getPath() }}">{{ $post->title }}</a>
            </p>
        @endforeach
    </div>








    <div class="max-w-md m-auto">

        <h2 class="text-center mb-8">Projects</h2>

        <div class="md:flex md:flex-row-reverse text-center md:text-left mb-8 md:mb-6">
            <div class="md:w-1/3 text-center flex flex-col justify-center items-center">
                <a href="https://fullstackeurope.com">
                    <img class="enlarge" style="max-width: 80%" src="/assets/images/fseu.png">
                </a>
            </div>
            <div class="md:w-2/3">
                <p class="text-2xl mb-0">
                    <a href="https://fullstackeurope.com">Full Stack Europe</a>
                </p>
                <p class="mb-0 text-grey-darker">A conference for every kind of developer.</p>
            </div>
        </div>
        <div class="md:flex md:flex-row-reverse text-center md:text-left mb-8 md:mb-6">
            <div class="md:w-1/3 text-center flex flex-col justify-center items-center">
                <a href="https://fullstackbelgium.be">
                    <img class="enlarge" style="max-width: 70px" src="/assets/images/fsbe.png">
                </a>
            </div>
            <div class="md:w-2/3">
                <p class="text-2xl mb-0">
                    <a href="https://fullstackbelgium.be">Full Stack Belgium</a>
                </p>
                <p class="mb-0 text-grey-darker">Meetups in Belgium for web developers.</p>
            </div>
        </div>
        <div class="md:flex md:flex-row-reverse text-center md:text-left mb-8 md:mb-6">
            <div class="md:w-1/3 text-center flex flex-col justify-center items-center">
                <a href="https://laravel.io">
                    <img class="enlarge" style="max-width: 80%" src="/assets/images/laravelio.png">
                </a>
            </div>
            <div class="md:w-2/3">
                <p class="text-2xl mb-0">
                    <a href="https://laravel.io">Laravel.io</a>
                </p>
                <p class="mb-0 text-grey-darker">The Laravel community platform.</p>
            </div>
        </div>
        <div class="md:flex md:flex-row-reverse text-center md:text-left mb-8 md:mb-6">
            <div class="md:w-1/3 text-center flex flex-col justify-center items-center">
            </div>
            <div class="md:w-2/3">
                <p class="text-2xl mb-0">
                    <a href="https://github.com/driesvints/dotfiles">Dotfiles</a>
                </p>
                <p class="mb-0 text-grey-darker">My preferred way to set up my Mac.</p>
            </div>
        </div>
    </div>
@endsection
