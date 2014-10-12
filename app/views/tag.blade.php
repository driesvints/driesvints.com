@extends('layout')

@section('content')

@include('posts', ['title' => "Tagged: &ldquo;$tag&rdquo;"])

@stop