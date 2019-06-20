<!DOCTYPE html>
<html lang="en">

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
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">

@include('_partials.google-analytics')
@include('_partials.fbvideo')

<div class="bg-gray-200 font-sans text-lg text-gray-800 leading-normal antialiased border-t-8 border-primary">
    @yield('body')
</div>

<script src="{{ mix('js/main.js', 'assets/build') }}"></script>
