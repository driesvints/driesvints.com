@extends('layout')

@section('content')

<div class="single">
    <p class="info">
        <small>
            {{ $post->date('F d, Y') }}

            @if (count($post->tags))
                · Tags: {{ $post->listTags() }}
            @endif
        </small>
    </p>

    <h1>{{ $post->title }}</h1>

    @if ($post->hasAged())
        <blockquote>
            <p>This post was published more than a year ago. Some of the tutorials or explanations in this post might be
             out of date or might not be applicable anymore today.</p>

             <p>Read at your own risk!</p>
        </blockquote>
    @endif

    {{ $post->body }}

    @include('disqus', ['item' => $post])
</div>

@stop