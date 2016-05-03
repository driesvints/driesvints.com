@extends('_layouts/master', ['title' => 'Blog'])

@section('content')

<div id="blog">
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
