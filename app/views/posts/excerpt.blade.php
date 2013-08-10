<h3>
	{{ HTML::linkRoute('posts.show', $post->title, $post->slug) }} 
</h3>

<p>
	<small class="post-info">
		{{ $post->date('F d, Y') }}
		@if ( ! $post->disable_comments)
		| <a href="{{ route('posts.show', $post->slug) }}#disqus_thread">{{ $post->title }}</a>
		@endif
	</small>
</p>

<p>{{ $post->excerpt }}</p>

<p><a href="{{ route('posts.show', $post->slug) }}">Read more <i class="icon-double-angle-right"></i></a></p>