@extends('layout')

@section('content')

@include('posts', ['title' => "&ldquo;$tag&rdquo;"])

@stop