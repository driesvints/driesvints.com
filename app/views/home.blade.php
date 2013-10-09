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

        	<p><a class="btn btn-success btn-large" href="{{ route('home') }}#contact">Available For Hire</a></p>

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

@include('footer')