@include('header', [
    'metaDescription' => 'Web Developer with a passion for open-source, community & Laravel.
    Currently works at BeatSwitch in the city of Antwerp, Belgium.'
])

<div id="header">
    <h1>Dries Vints</h1>

    <h2>Web Developer</h2>

    <p class="navigation">
        <a href="{{ route('blog') }}">Blog</a> ·
        <a href="#about">About</a>
    </p>

    <a class="next icon-highlight" href="#about"><i class="fa fa-chevron-circle-down"></i></a>
</div>

<div id="about">
    <img class="img-circle" src="http://www.gravatar.com/avatar/e8321183acdf47a9ce838afd13a964b5.jpg?s=125" alt="">
    <h3>Dries Vints</h3>
    <p>
        Maintainer of <a href="http://laravel.io">Laravel.IO</a>, the <a href="http://laravel.com">Laravel</a> Community Platform. Creator of <a href="https://github.com/BeatSwitch/lock">Lock</a>, a popular PHP Acl package. Lead Developer at <a href="http://beatswitch.com">BeatSwitch</a>.
    </p>
</div>

<hr class="home-separator" />

<div id="recent-posts">
    @if (count($posts))
        @foreach ($posts as $post)
            @include('excerpt')
        @endforeach
    @endif

    <p class="blog-btn">
        <a class="btn btn-default btn-lg btn-outline" href="{{ route('blog') }}">Read More</a>
    </p>
</div>

@include('footer')