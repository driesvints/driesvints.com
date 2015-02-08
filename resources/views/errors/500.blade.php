@extends('layout', ['pageTitle' => 'Something went wrong'])

@section('content')

<div id="error-page">
    <h1>Something went wrong</h1>
    <p>Whoops! This shouldn't have happened. We've set out our minions to deal with the problem.</p>
    <a class="btn btn-default btn-outline" href="{{ route('home') }}"><i class="fa fa-chevron-left"></i> Return to homepage</a>
</div>

@stop