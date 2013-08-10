@if (count($posts))
	@foreach ($posts as $post)
		@include('posts.excerpt')
	@endforeach
@endif

@if ($posts instanceof \Illuminate\Pagination\Paginator)
	{{ $posts->links() }}
@endif

@section('scripts')
	@parent

	var disqus_shortname = 'driesvints';
	
	(function () {
	var s = document.createElement('script'); s.async = true;
	s.type = 'text/javascript';
	s.src = 'http://' + disqus_shortname + '.disqus.com/count.js';
	(document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
	}());
@stop