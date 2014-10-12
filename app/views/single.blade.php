@extends('layouts.public')

@section('content')

<div class="single-post">
    <p class="post-info">
        <small>
            {{ $item->date('F d, Y') }}

            @if (count($item->tags))
                &bull; Tags: {{ $item->listTags() }}
            @endif
        </small>
    </p>

    <h1>{{ $item->title }}</h1>

    @if ($item->hasAged())
        <blockquote>
            <p>This post was published more than a year ago. Some of the tutorials or explanations in this post might be
             out of date or might not be applicable anymore today.</p>

             <p>Read at your own risk!</p>
        </blockquote>
    @endif

    {{ $item->body }}

    @include('disqus')
</div>

@stop