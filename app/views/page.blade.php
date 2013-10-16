@extends('layouts.public')

@section('content')

<div class="single-post">
    <p class="post-info">
        <small>
            @if (count($item->tags))
            &bull; Tags: {{ $item->listTags() }}
            @endif
        </small>
    </p>

    <h1>{{ $item->title }}</h1>

    {{ $item->body }}

    @include('disqus')
</div>

@stop