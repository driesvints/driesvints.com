@extends('public.layout')

@section('content')

<h2>Posts tagged with &ldquo;{{ $tag }}&rdquo;</h2>

@if (count($posts))
	@include('public.posts.list')
@else
	<p>No posts found.</p>
@endif

@stop