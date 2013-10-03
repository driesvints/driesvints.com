@include('header')

<div class="container">

<div class="row">
	<div class="col-lg-12">
		<div class="page-header">
			<h1><a href="{{ route('home') }}">Dries Vints</a> <small>Web Developer with a passion for PHP, Open Source and Community</small></h1>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-9">
		@yield('content')
	</div>

	<div class="col-lg-3 about">
		@section('about')
			<p class="avatar-frame">
				<img class="img-circle" src="http://www.gravatar.com/avatar/e8321183acdf47a9ce838afd13a964b5.jpg?s=200" />
			</p>
			
			<p>
				Hi, I'm Dries. A <strong>web developer</strong> from Belgium.
			</p>

			<p>
				I spend most of my days working a day time job in the city of Antwerp and collaborating on <strong>open-source</strong> projects.</p>

			<p>
				I also do a weekly blog post series called &ldquo;<strong>Laravel</strong> Weekly&rdquo; at <a href="http://laravel.io">Laravel.io</a> and write documentation manuals for <a href="http://cartalyst.com">Cartalyst</a>.
			</p>

			<p>
				I hang out a lot on <a href="http://laravel.io/irc">the #laravel IRC channel</a> so why don't you drop by and come say hi!
			</p>
			
			<p class="social-icons">
				<a href="https://twitter.com/driesvints"><i class="icon-twitter"></i>
				<a href="https://github.com/driesvints"><i class="icon-github"></i></a>
				<a href="mailto:dries.vints@gmail.com"><i class="icon-envelope"></i></a>
			</p>
		@show
	</div>
</div>

</div><!-- .container -->

@include('footer')