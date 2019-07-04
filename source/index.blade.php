@extends('_layouts.master', [
    'metaDescription' => 'I\'m a software engineer from Antwerp, Belgium, work for Laravel, organise meetups for Full Stack Belgium and organise the Full Stack Europe conference.',
])

@section('body')
    @component('_components.header')
        <div class="text-center sm:text-left">
            <h1 class="text-5xl font-bold mb-6">
                Hi, I'm Dries
            </h1>

            <p class="text-2xl sm:text-3xl leading-snug mb-8">
                Software engineer at <a href="https://laravel.com">Laravel</a>, <a href="https://fullstackbelgium">meetup</a> & <a href="https://fullstackeurope.com">conference</a> organiser, open-source <a href="https://laravel.io">maintainer</a>, speaker, and <a href="/blog">blogger</a>.
            </p>

            <a href="/#about">
                More about me &rightarrow;
            </a>
        </div>
    @endcomponent

    <div id="content">
        <div class="max-w-2xl mx-auto px-6 py-10 sm:py-20">
            <h2 class="text-4xl text-center sm:text-left font-bold mb-4 sm:mb-12">Latest Posts</h2>

            <p class="text-base text-center font-bold sm:float-right sm:-mt-20 mb-8">
                <a href="/blog">View all &raquo;</a>
            </p>

            @foreach($posts->take(5) as $post)
                <span class="block text-xs uppercase text-gray-600">
                    {{ date('F j, Y', $post->date) }}
                </span>
                <p class="text-2xl mb-8">
                    <a href="{{ $post->getPath() }}">{{ $post->title }}</a>
                </p>
            @endforeach
        </div>

        <div id="projects" class="bg-gray-200">
            <div class="max-w-6xl mx-auto px-6 py-10 sm:py-20">
                <h2 class="text-4xl text-center font-bold mb-10">Projects</h2>

                <div class="md:flex mb-16">
                    <div class="project sm:flex-1 px-4 lg:px-8 mb-16 md:mb-0">
                        <a href="https://fullstackeurope.com" target="_blank">
                            <div class="bg-white enlarge text-center text-base rounded-lg border-t-6 border-primary shadow-lg h-full px-8 md:px-12 py-8">
                                <div class="h-24 pt-5 mb-6">
                                    <img src="/assets/images/fseu.png" class="inline-block max-h-full" alt="">
                                </div>
                                <p class="mb-6">A conference for every kind of developer</p>
                                <p class="text-sm text-gray-600">fullstackeurope.com <i class="fas fa-external-link-alt"></i></p>
                            </div>
                        </a>
                    </div>
                    <div class="project md:flex-1 px-4 lg:px-8 mb-16 md:mb-0">
                        <a href="https://fullstackbelgium.be" target="_blank">
                            <div class="bg-white enlarge text-center text-base rounded-lg border-t-6 border-primary shadow-lg h-full px-8 md:px-12 py-8">
                                <div class="h-24 mb-6">
                                    <img src="/assets/images/fsbe.png" class="inline-block max-h-full" alt="">
                                </div>
                                <p class="mb-6">Meetups in Belgium for web developers</p>
                                <p class="text-sm text-gray-600">fullstackbelgium.be <i class="fas fa-external-link-alt"></i></p>
                            </div>
                        </a>
                    </div>
                    <div class="project md:flex-1 px-4 lg:px-8">
                        <a href="https://laravel.io" target="_blank">
                            <div class="bg-white enlarge text-center text-base rounded-lg border-t-6 border-primary shadow-lg h-full px-8 md:px-12 py-8">
                                <div class="h-24 pt-8 mb-6">
                                    <img src="/assets/images/laravelio.png" class="inline-block max-h-full" style="max-width: 80%" alt="">
                                </div>
                                <p class="mb-6">The Laravel community platform</p>
                                <p class="text-sm text-gray-600">laravel.io <i class="fas fa-external-link-alt"></i></p>
                            </div>
                        </a>
                    </div>
                </div>

                <p class="text-base text-gray-700 text-center">
                    + <a href="https://github.com/driesvints/dotfiles">Dotfiles</a>, my preferred way to set up my Mac.
                </p>
            </div>
        </div>
    </div>

    <div id="about" class="max-w-2xl mx-auto px-6 py-10 sm:py-20">
        <h2 class="text-4xl text-center font-bold mb-10">About Me</h2>

        <p class="mb-4">
            I'm a software engineer from Antwerp, Belgium. I work as one of the core team members of <a href="https://laravel.com">Laravel</a>, the popular PHP framework.
        </p>

        <p class="mb-4">
            My passions are <a href="https://github.com/driesvints">open source</a>, building communities, managing software teams, and creating quality and maintainable products.
        </p>

        <p class="mb-4">
            I organize meetups for <a href="https://fullstackbelgium.be">Full Stack Belgium</a> in the cities of <a href="https://meetup.com/fullstackantwerp">Antwerp</a> and <a href="https://meetup.com/fullstackghent">Ghent</a>. I'm also the co-organizer of <a href="https://fullstackeurope.com">Full Stack Europe</a>, a conference for every kind of developer.
        </p>

        <p>
            Follow me on Twitter at <a href="https://twitter.com/driesvints" target="_blank">@driesvints</a>
        </p>
    </div>
@endsection
