<a class="excerpt" href="/blog/{{ $post['slug'] }}">
    <p class="date">{{ $post['date']->format('F d, Y') }}</p>

    <h3>{{ $post['title'] }}</h3>

    <p>{{ $post['excerpt'] }}</p>
</a>
