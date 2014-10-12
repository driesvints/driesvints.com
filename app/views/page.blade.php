@extends('layout')

@section('content')

<div class="single">
    <p class="info">
        <small>
            @if (count($page->tags))
                &bull; Tags: {{ $page->listTags() }}
            @endif
        </small>
    </p>

    <h1>{{ $page->title }}</h1>

    {{ $page->body }}

    @include('disqus', ['item' => $page])
</div>

@stop