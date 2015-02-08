@extends('layout', ['pageTitle' => 'Page not found'])

@section('content')

<div id="error-page">
    <h1>Page not found</h1>
    <p>Whoops! Looks like this page isn't here (anymore).</p>
    <a class="btn btn-default btn-outline" href="{{ route('home') }}"><i class="fa fa-chevron-left"></i> Return to homepage</a>
</div>

@stop