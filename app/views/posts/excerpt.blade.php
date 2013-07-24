<h2>{{ HTML::linkRoute('posts.show', $post->title, $post->slug) }}</h2>

<p>Posted on {{ $post->date('F d, Y') }}</p>

<p>{{ $post->excerpt }}</p>

<p>{{ HTML::linkRoute('posts.show', 'Read more...', $post->slug) }}</p>