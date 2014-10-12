<a class="excerpt" href="{{ route('post', $post->slug) }}">
    <p class="date">{{ $post->date('F d, Y') }}</p>

    <h3>{{ $post->title }}</h3>

    <p>{{ strip_tags($post->excerpt) }}</p>
</a>