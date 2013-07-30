@extends('layout')

@section('content')

<h2>{{ $item->title }}</h2>

<p class="post-date">Posted on {{ $item->date('F d, Y') }}</p>

{{ $item->body }}

@stop