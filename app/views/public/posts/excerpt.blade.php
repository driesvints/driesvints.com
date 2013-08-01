<h3>{{ HTML::linkRoute('posts.show', $post->title, $post->slug) }} <small class="post-date">{{ $post->date('F d, Y') }}</small></h3>

<p>{{ $post->excerpt }}</p>

<p><a href="{{ route('posts.show', $post->slug) }}">Read more <i class="icon-double-angle-right"></i></a></p>