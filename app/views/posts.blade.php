<div id="archive">
    <h1 class="title">{{ $title }}</h1>

    @if (count($posts))
        <h3>{{ $year = $posts->first()->date('Y') }}</h3>

        @foreach ($posts as $post)
            @if ($post->date('Y') !== $year )
                <h3>{{ $year = $post->date('Y') }}</h3>
            @endif

            <div class="post">
                <div class="date">{{ $post->date('F j') }}</div>
                <div class="title">
                    <a href="{{ route('post', $post->slug) }}">{{ $post->title }}</a>
                </div>
                <div class="clearfix"></div>
            </div>
        @endforeach
    @else
        <p>No posts found.</p>
    @endif
</div>