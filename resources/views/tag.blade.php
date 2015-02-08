@extends('layout', ['pageTitle' => "Tagged: $tag"])

@section('content')

@include('posts', ['title' => "Tagged: &ldquo;$tag&rdquo;"])

@stop