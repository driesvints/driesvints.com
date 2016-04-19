@extends('_layouts/master', ['pageTitle' => 'Blog'])

@section('content')

<div id="blog">
    <h1 class="title">Blog</h1>

    @php($firstPost = $posts->first())

    <h3>{{ $year = $firstPost->publishedAt()->format('Y') }}</h3>

    @foreach ($posts as $post)
        @if ($post->publishedAt()->format('Y') !== $year )
            <h3>{{ $year = $post->publishedAt()->format('Y') }}</h3>
        @endif

        <div class="post">
            <div class="date">{{ $firstPost->publishedAt()->format('F j') }}</div>
            <div class="title">
                <a href="/blog/{{ $post->slug() }}">{{ $post->title() }}</a>
            </div>
            <div class="clearfix"></div>
        </div>
    @endforeach
</div>

@stop
