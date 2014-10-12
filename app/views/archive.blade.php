@extends('layouts.public')

@section('content')

<div id="archive">
    <h1 class="title">Archive</h1>

    @if (count($posts))
        <h3>{{ $year = $posts->first()->date('Y') }}</h3>

        @foreach ($posts as $post)
            @if ($post->date('Y') !== $year )
                <h3>{{ $year = $post->date('Y') }}</h3>
            @endif

            <div class="item">
                <div class="item-date">{{ $post->date('F j') }}</div>
                <div class="item-title">
                    <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                </div>
                <div class="clearfix"></div>
            </div>
        @endforeach
    @endif
</div>

@stop