@extends('layout', ['pageTitle' => $page->title, 'metaDescription' => $page->excerpt])

@section('content')

<div class="single">
    <p class="info">
        <small>
            @if (count($page->tags))
                · Tags: {{ $page->listTags() }}
            @endif
        </small>
    </p>

    <h1>{{ $page->title }}</h1>

    {{ $page->body }}

    @include('disqus', ['item' => $page])
</div>

@stop