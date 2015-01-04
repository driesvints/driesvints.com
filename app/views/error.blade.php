@extends('layout', ['pageTitle' => $title])

@section('content')

<div id="error-page">
    <h1>{{ $title }}</h1>
    <p>{{ $description }}</p>
    <a class="btn btn-default btn-outline" href="{{ route('home') }}"><i class="fa fa-chevron-left"></i> Return to homepage</a>
</div>

@stop