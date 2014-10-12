@include('header')

<div id="header">
    <div class="about">
        <h1>Dries Vints</h1>

        <h2>
            Web Developer with<br>
            a passion for Open-Source,<br>
            Community &amp; Laravel
        </h2>

        <ul class="list-unstyled">
            <li><a href="{{ route('home') }}#content">Blog</a></li>
            <li class="second"><a href="#work">Work</a></li>
            <li class="third"><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>

        <p><a class="next" href="#content"><i class="icon-chevron-sign-down"></i></a></p>
    </div>
</div>

<div id="content" class="container">
    <h2 class="title">Recent Posts</h2>

    @if (count($posts))
        @foreach ($posts as $post)
            @include('excerpt')
        @endforeach
    @endif

    <p class="archive-btn">
        <a class="btn btn-default" href="{{ route('archive') }}">View All <i class="icon-chevron-right"></i></a>
    </p>
</div><!-- .container -->

<div id="work">
    <h2 id="work-title" class="title">Work</h2>

    <div class="item off laravelio">
        <div class="container">
            <div class="row">
                <div class="col-md-4 logo">
                    <a href="http://laravel.io">{{ HTML::image('assets/images/laravel-io-logo.png') }}</a>
                </div>
                <div class="col-md-8">
                    <h3>Laravel.IO</h3>

                    <p>I maintain the Laravel community portal called <a href="http://laravel.io">Laravel.IO</a>, which is a platform where the Laravel community can find help through the forums, share code using the pastebin, listen to the regular podcast featuring prominent community members and much more. Go have a look and join us!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="item beatswitch">
        <div class="container">
            <div class="row">
                <div class="col-md-4 logo">
                    <a href="http://beatswitch.com">{{ HTML::image('assets/images/beatswitch.png', null, array('width' => 300)) }}</a>
                </div>
                <div class="col-md-8">
                    <h3>BeatSwitch</h3>

                    <p>My day job at <a href="http://beatswitch.com">BeatSwitch</a> consists of maintenance for the BeatSwitch platform as well as the development of new features and functionality.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-4 avatar">
                <img class="img-circle" src="http://www.gravatar.com/avatar/e8321183acdf47a9ce838afd13a964b5.jpg?s=300" alt="">
            </div>
            <div class="col-md-8 description">
                <h3>About Dries</h3>

                <p>Hi, I'm Dries. A web developer from Belgium.</p>
 
                <p>
                    I spend most of my days working on web projects and collaborating on open-source projects.
                    I work mostly with PHP and <a href="http://laravel.com/">the Laravel framework</a>.
                </p>

                <p>
                    I'm a very active member of the Laravel community. I maintain the Laravel community platform,
                    <a href="http://laravel.io">Laravel.io</a> and work at a company named
                    <a href="http://beatswitch.com">BeatSwitch</a>.
                </p>
 
                <p>
                    I hang out a lot on <a href="http://laravel.io/irc">the #laravel IRC channel</a> so why don't you drop by to say hi!
                </p>
            </div>
        </div>
    </div>
</div>

<div id="contact">
    <div class="container">
        <div class="row">
            <div class="col-xs-4">
                <a href="https://twitter.com/driesvints"><i class="icon-twitter"></i>
            </div>
            <div class="col-xs-4">
                <a href="https://github.com/driesvints"><i class="icon-github"></i></a>
            </div>
            <div class="col-xs-4">
                <a href="mailto:dries.vints@gmail.com"><i class="icon-envelope"></i></a>
            </div>
        </div>
    </div>
</div>

@include('footer')