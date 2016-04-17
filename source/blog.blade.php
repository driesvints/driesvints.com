@extends('_layouts/master', ['pageTitle' => 'Blog'])

@section('content')

<div id="blog">
    <h1 class="title">Blog</h1>

    @php($firstPost = array_first($posts))

    <h3>{{ $year = $firstPost['date']->format('Y') }}</h3>

    @foreach ($posts as $post)
        @if ($firstPost['date']->format('Y') !== $year )
            <h3>{{ $year = $firstPost->format('Y') }}</h3>
        @endif

        <div class="post">
            <div class="date">{{ $firstPost['date']->format('F j') }}</div>
            <div class="title">
                <a href="/blog/{{ $post['slug'] }}">{{ $post['title'] }}</a>
            </div>
            <div class="clearfix"></div>
        </div>
    @endforeach
</div>

@stop
