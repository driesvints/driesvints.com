@include('_partials/header', [
    'metaDescription' => 'Web Developer with a passion for open-source,
    community & Laravel. Currently works at BeatSwitch in the city of Antwerp,
    Belgium.'
])

<div id="header">
    <h1>Dries Vints</h1>
    <h2>Web Developer</h2>

    <p class="navigation">
        <a href="#about">About</a> ·
        <a href="https://medium.com/@driesvints">Blog</a>
    </p>

    <a class="next icon-highlight" href="#about">
        <i class="fa fa-chevron-down"></i>
    </a>
</div>

<div id="about">
    <img class="img-circle" itemprop="image" src="https://www.gravatar.com/avatar/e8321183acdf47a9ce838afd13a964b5.jpg?s=125" alt="">
    <h3>Dries Vints</h3>
    <p>
        I work at <a href="http://beatswitch.com">BeatSwitch</a>,
        maintain <a href="http://laravel.io">Laravel.io</a>
        and organise meetups for <a href="http://phpantwerp.be">PHP Antwerp</a>.
        Building <a href="http://qapilot.com">Pilot</a>.
    </p>
    <p>Live and let live.</p>
</div>

@include('_partials/footer')
