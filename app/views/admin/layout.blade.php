@include('admin.header')

<div class="navbar">
	<a class="navbar-brand" href="{{ route('home') }}">Dries Vints</a>
	<ul class="nav navbar-nav">
		<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
		<li><a href="{{ route('admin.posts.index') }}">Posts</a></li>
		<li><a href="{{ route('admin.pages.index') }}">Pages</a></li>
	</ul>
	<ul class="nav navbar-nav pull-right">
		<li><a href="{{ route('logout') }}">Logout</a></li>
	</ul>
	<p class="navbar-text pull-right">Signed in as {{ Auth::user()->fullname() }}</p>
</div>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			@yield('content')
		</div>
	</div>
	
	<hr>
	
	<div class="row">
		<div class="col-lg-12">
			<p class="pull-left">Copyright &copy; {{ date('Y') }} Dries Vints</p>
	
			<p class="pull-right"><a href="#">back to top</a></p>
		</div>
	</div>
</div>

@include('admin.footer')