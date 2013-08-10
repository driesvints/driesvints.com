<h3>
	{{ HTML::linkRoute('posts.show', $post->title, $post->slug) }} 
	<small class="post-info">
		{{ $post->date('F d, Y') }}
	</small>
</h3>

<p>{{ $post->excerpt }}</p>