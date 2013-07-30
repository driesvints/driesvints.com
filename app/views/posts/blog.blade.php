@extends('layout')

@section('content')

<h2>{{ $title }}</h2>

@include('posts.list')

@stop