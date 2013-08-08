@include('header')

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

@include('footer')