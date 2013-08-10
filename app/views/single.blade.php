@extends('layouts.public')

@section('content')

<h2>{{ $item->title }}</h2>

<p class="post-date">
	Posted on {{ $item->date('F d, Y') }}

	@if (isset($tags) && ! empty($tags))
	| Tagged in: {{ $tags }}
	@endif
</p>

{{ $item->body }}

@stop