<a href="{{ route('post', $post->slug) }}" class="post">
    <p class="post-date">{{ $post->date('F d, Y') }}</p>

    <h3>{{ $post->title }}</h3>

    <p>{{ strip_tags($post->excerpt) }}</p>
</a>