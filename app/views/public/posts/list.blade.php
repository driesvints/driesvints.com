@if (count($posts))
	@foreach ($posts as $post)
		@include('public.posts.excerpt')
	@endforeach
@endif

@if ($posts instanceof \Illuminate\Pagination\Paginator)
	{{ $posts->links() }}
@endif