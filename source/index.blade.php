@extends('_layouts.master', [
    'metaDescription' => 'I work for Laravel, maintain Laravel.io and organise Full Stack Belgium and Full Stack Europe.',
])

@section('body')
    <div class="text-center mb-4">
        <img src="https://www.gravatar.com/avatar/e8321183acdf47a9ce838afd13a964b5?s=240" width="120" class="rounded-full inline-block">
    </div>

    <div class="text-center">
        <h1>Dries Vints</h1>
    </div>

    <p>Hey, I'm <a href="https://twitter.com/driesvints">@driesvints</a>, a software engineer from Antwerp, Belgium. I currently work for <a href="https://laravel.com">Laravel</a>, the PHP Framework for Web Artisans.</p>

    <p>I also co-organize <a href="https://fullstackeurope.com">Full Stack Europe</a>, a conference for every kind of developer coming to Antwerp in October 2019.</p>

    <p class="mb-8">And in Belgium I co-organize <a href="https://fullstackbelgium.be">Full Stack Belgium</a> meetups for web developers in the cities of <a href="https://meetup.com/fullstackantwerp">Antwerp</a>, <a href="https://meetup.com/fullstackghent">Ghent</a> and <a href="https://meetup.com/fullstackbrussels">Brussels</a>.</p>

    <p class="text-3xl text-center mb-12">
        <a class="mr-4" href="https://twitter.com/driesvints"><i class="enlarge fab fa-twitter"></i></a>
        <a class="mr-4" href="https://github.com/driesvints"><i class="enlarge fab fa-github"></i></a>
        <a class="mr-4" href="https://medium.com/@driesvints"><i class="enlarge fab fa-medium-m"></i></a>
        <a class="mr-4" href="https://www.linkedin.com/in/driesvints"><i class="enlarge fab fa-linkedin-in"></i></a>
        <a class="" href="mailto:dries.vints@gmail.com"><i class="enlarge fas fa-paper-plane"></i></a>
    </p>

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

    <div class="text-center">
        <h2>Latest Posts</h2>
    </div>

    @foreach($posts->take(5) as $post)
        <span class="block italic text-sm">
            {{ date('F j, Y', $post->date) }}
        </span>
        <p class="text-2xl">
            <a href="{{ $post->getPath() }}">{{ $post->title }}</a>
        </p>
    @endforeach

    <p class="text-center mt-8"><a href="/blog">View All &rsaquo;</a></p>
@endsection
