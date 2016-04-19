@extends('_layouts/master', ['pageTitle' => 'Blog'])

@section('content')

<div id="blog">
    <h1 class="title">Blog</h1>

    @foreach ($posts as $post)
        <div class="post">
            <div class="date">{{ $post->publishedAt()->format('F j, Y') }}</div>
            <div class="title">
                <a href="/blog/{{ $post->slug() }}">{{ $post->title() }}</a>
            </div>
            <div class="clearfix"></div>
        </div>
    @endforeach
</div>

@stop
