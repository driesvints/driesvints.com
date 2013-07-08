<h1>Blog</h1>

@if (count($posts))
	@foreach ($posts as $post)
	<h2>{{ HTML::linkRoute('blog.show', $post->title, $post->slug) }}</h2>

	<p>Posted on {{ $post->date }}</p>

	{{ $post->body }}
	@endforeach
@else
<p>No posts to show.</p>
@endif