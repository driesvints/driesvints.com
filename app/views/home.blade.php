@include('header')

<div id="header">
    <div class="container">
        <ul class="list-inline">
        	<li><a href="{{ route('home') }}#recent-posts">Blog</a></li>
        	<li class="second"><a href="#work-title">Work</a></li>
        	<li class="third"><a href="#about">About</a></li>
        	<li><a href="#contact">Contact</a></li>
        </ul>

        <div class="about">
        	<h1>Dries Vints</h1>

        	<h2>
        		Freelance Web Developer with<br>
        		a passion for Open-Source,<br>
        		Community &amp; Laravel
        	</h2>

        	<p><a class="btn btn-success btn-large" href="mailto:dries.vints@gmail.com">Available For Hire</a></p>

        	<p><a class="next" href="#recent-posts"><i class="icon-chevron-sign-down"></i></a></p>
        </div>
    </div>
</div>

<div id="content" class="container">
    <h2 id="recent-posts" class="title">Recent Posts</h2>

    @include('posts.list')

    <p class="archive-btn">
        <a class="btn btn-default" href="{{ route('archive') }}">View All <i class="icon-chevron-right"></i></a>
    </p>
</div><!-- .container -->

<h2 id="work-title" class="title">Work</h2>

<div id="work">
    <div class="item off">
        <div class="container">
            <div class="row">
                <div class="col-md-4 logo">
                    <a href="http://cartalyst.com">{{ HTML::image('images/cartalyst.png', null, array('width' => 200)) }}</a>
                </div>
                <div class="col-md-8">
                    <h3>Cartalyst</h3>

                    <p>My work for Cartalyst consists mainly about writing documentation manuals. So far I've written manuals for the <a href="http://docs.cartalyst.com/data-grid">Data Grid</a> and <a href="http://docs.cartalyst.com/api">API</a> packages as well as for the upcoming <a href="http://docs.cartalyst.com/platform2">Platform 2</a> application.</p>

                    <p>I've recently joined the team to continue to work further on documentation as well as to help with Cartalyst services.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="container">
            <div class="row">
                <div class="col-md-4 logo">
                    <a href="http://laravelweekly.com">{{ HTML::image('images/laravel-weekly.png') }}</a>
                </div>
                <div class="col-md-8">
                    <h3>Laravel Weekly</h3>

                    <p><a href="http://laravelweekly.com">Laravel Weekly</a> is a weekly newsletter full of resources and news about the <a href="http://laravel.com/">Laravel PHP framework</a>. I started this as a weekly blog post series which eventually moved to the <a href="http://laravel.io/">Laravel IO community portal</a> and then became a weekly newsletter.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="item off">
        <div class="container">
            <div class="row">
                <div class="col-md-4 logo">
                    <a href="https://github.com/prologue">{{ HTML::image('images/prologue.png') }}</a>
                </div>
                <div class="col-md-8">
                    <h3>Prologue</h3>

                    <p><a href="https://github.com/prologue">Prologue</a> is the vendor name under which I publish my open-source packages. Some of the packages I made are <a href="https://github.com/Prologue/Alerts">the Alerts package</a> which handles global site notifications in Laravel. Another one is <a href="https://github.com/Prologue/Phpconsole">the Phpconsole package</a> which provides out-of-the-box support in Laravel for <a href="http://phpconsole.com/">the Phpconsole library</a>.</p>
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

                <p>Hi, I'm Dries. A <strong>web developer</strong> from Belgium.</p>
 
                <p>
                    I spend most of my days working as a freelancer and collaborating on <strong>open-source</strong> projects. I work mostly with PHP and <a href="http://laravel.com/">the Laravel framework</a>.
                </p>

                <p>
                    I'm a very active member of the Laravel community. I do a weekly newsletter called <a href="http://laravelweekly.com">&ldquo;Laravel Weekly&rdquo;</a> at <a href="http://laravel.io">Laravel.io</a> and write documentation manuals for <a href="http://cartalyst.com">Cartalyst</a>.
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
            <div class="col-sm-3 col-xs-6">
                <a href="https://twitter.com/driesvints"><i class="icon-twitter"></i>
            </div>
            <div class="col-sm-3 col-xs-6">
                <a href="https://github.com/driesvints"><i class="icon-github"></i></a>
            </div>
            <div class="col-sm-3 col-xs-6">
                <a href="mailto:dries.vints@gmail.com"><i class="icon-envelope"></i></a>
            </div>
            <div class="col-sm-3 col-xs-6">
                <a href="http://www.linkedin.com/in/driesvints"><i class="icon-linkedin"></i></a>
            </div>
        </div>
    </div>
</div>

@include('footer')