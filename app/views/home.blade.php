@include('header')

<div id="header">
    <div class="container">
        <ul class="list-inline">
        	<li><a href="#recent-posts">Blog</a></li>
        	<li class="second"><a href="#">Work</a></li>
        	<li class="third"><a href="#">About</a></li>
        	<li><a href="#">Contact</a></li>
        </ul>

        <div class="about">
        	<h1>Dries Vints</h1>

        	<h2>
        		Freelance PHP Developer with<br>
        		a passion for Open-Source,<br>
        		Community &amp; Laravel
        	</h2>

        	<p><a class="btn btn-success btn-large" href="#">Available For Hire</a></p>

        	<p><a class="next" href="#recent-posts"><i class="icon-chevron-sign-down"></i></a></p>
        </div>
    </div>
</div>

<div id="posts" class="container">

<h2 id="recent-posts">Recent Posts</h2>

@include('posts.list')

</div><!-- .container -->

@include('footer')