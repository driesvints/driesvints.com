@extends('_layouts.master', [
    'metaDescription' => 'I work for Laravel, maintain Laravel.io and organise Full Stack Antwerp and Full Stack Europe.',
])

@section('body')
    <div id="header">
        <div class="about">
            <h1>Dries Vints</h1>
            <h2>Software Engineer</h2>
            <p class="bio">
                I work for <a href="https://laravel.com">Laravel</a>,
                maintain <a href="https://laravel.io">Laravel.io</a>
                and organise <a href="https://fullstackantwerp.be">Full Stack Antwerp</a>
                and <a href="https://fullstackeurope.com">Full Stack Europe</a>.
            </p>
            <p class="social-media">
                <a href="https://twitter.com/driesvints"><i class="fab fa-twitter"></i></a>
                <a href="https://github.com/driesvints"><i class="fab fa-github"></i></a>
                <a href="https://medium.com/@driesvints"><i class="fab fa-medium-m"></i></a>
                <a href="https://www.linkedin.com/in/driesvints"><i class="fab fa-linkedin-in"></i></a>
                <a href="mailto:dries.vints@gmail.com" class="email"><i class="fas fa-paper-plane"></i></a>
            </p>
        </div>
    </div>
@endsection
