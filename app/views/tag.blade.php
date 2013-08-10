@extends('layouts.public')

@section('content')

<h2>Posts tagged with &ldquo;{{ $tag }}&rdquo;</h2>

@if (count($posts))
	@include('posts.list')
@else
	<p>No posts found.</p>
@endif

@stop