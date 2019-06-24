<!DOCTYPE html>
<html lang="en" class="bg-gray-100">

<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site info -->
<title>{{ isset($title) ? "$title | " : '' }}Dries Vints</title>

@isset($metaDescription)
    <meta name="description" content="{{ $metaDescription }}">
@endisset

@if ($page->date)
    <meta property="article:published_time" content="{{ date('Y-m-d', $page->date) }}" />
@endif

<link href="/blog/feed.atom" type="application/atom+xml" rel="alternate" title="{{ $page->siteName }} Atom Feed">

<!-- Stylsheets -->
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,600,600i,700,700i;Ubuntu+Mono" rel="stylesheet">
<link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">

<script src="https://kit.fontawesome.com/980abfb339.js"></script>

@include('_partials.google-analytics')
@include('_partials.fbvideo')

<div class="font-sans text-xl text-gray-700 leading-normal antialiased border-t-6 border-primary">
    @yield('body')
</div>

@include('_layouts.footer')

<script src="{{ mix('js/main.js', 'assets/build') }}"></script>
