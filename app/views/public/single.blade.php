@extends('public.layout')

@section('content')

<h2>{{ $item->title }}</h2>

<p class="post-date">Posted on {{ $item->date('F d, Y') }}</p>

{{ $item->body }}

@if (isset($tags) && ! empty($tags))
<p><em>Tagged in: {{ $tags }}</em></p>
@endif

@stop