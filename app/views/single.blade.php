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

    {{ $item->body }}

    @include('disqus')
</div>

@stop