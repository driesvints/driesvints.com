@include('header')

<div id="header">
    <div class="container">
        <ul class="list-inline">
        	<li><a href="{{ route('home') }}#recent-posts">Blog</a></li>
        	<li class="second"><a href="#">Work</a></li>
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

<div id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-4 avatar">
                <img class="img-circle" src="http://www.gravatar.com/avatar/e8321183acdf47a9ce838afd13a964b5.jpg?s=300" alt="">
            </div>
            <div class="col-md-8">
                <h2>About Dries</h2>

                <p>Hi, I'm Dries. A <strong>web developer</strong> from Belgium.</p>
 
                <p>
                    I spend most of my days working as a freelancer and collaborating on <strong>open-source</strong> projects. I work mostly with PHP and <a href="http://laravel.com/">the Laravel framework</a>.
                </p>

                <p>
                    I'm a very active member of the Laravel community. I do a weekly newsletter called <a href="http://laravelweekly.com">&ldquo;Laravel Weekly&rdquo;</a> at <a href="http://laravel.io">Laravel.io</a> and write documentation manuals for <a href="http://cartalyst.com">Cartalyst</a>.
                </p>
 
                <p>
                    I hang out a lot on <a href="http://laravel.io/irc">the #laravel IRC channel</a>. Drop by from time to time to say hi!
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