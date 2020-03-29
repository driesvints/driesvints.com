<!DOCTYPE html>
<html lang="en" class="bg-gray-100">

<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site info -->
@php($title = isset($title) ? "$title | Dries Vints" : 'Dries Vints')
<title>{{ $title }}</title>

<meta property="og:type" content="website">
<meta property="og:title" content="{{ $title }}">
<meta property="og:image" content="{{ $this->baseUrl . 'assets/images/driesvints.jpg' }}">
<meta property="og:url" content="{{ $this->baseUrl }}">
<meta property="og:locale" content="en_US" />
<meta property="twitter:site" content="@driesvints">
<meta property="twitter:creator" content="@driesvints">
<meta property="twitter:url" content="{{ $this->baseUrl }}">
<meta property="twitter:title" content="{{ $title }}">
<meta property="twitter:image" content="{{ $this->baseUrl . 'assets/images/driesvints.jpg' }}">

@isset($metaDescription)
    <meta name="description" content="{{ $metaDescription }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="twitter:description" content="{{ $metaDescription }}">
@endisset

@if ($page->date)
    <meta property="article:published_time" content="{{ date('Y-m-d', $page->date) }}" />
@endif

<link href="/blog/feed.atom" type="application/atom+xml" rel="alternate" title="{{ $page->siteName }} Atom Feed">

<!-- Stylsheets -->
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,600,600i,700,700i;Ubuntu+Mono" rel="stylesheet">
<link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">

<script src="https://kit.fontawesome.com/980abfb339.js"></script>

@include('_partials.fbvideo')

<div class="font-sans text-xl text-gray-700 leading-normal antialiased border-t-6 border-primary">
    <div class="bg-secondary text-white font-semibold hover:underline py-3 px-6" target="_blank">
        <div class="wrapper text-center">
            <a class="focus:underline focus:bg-transparent" href="https://fullstackeurope.com/2020" target="_blank" rel="noopener">
                Join me at Full Stack Europe →
            </a>
        </div>
    </div>

    @yield('body')
</div>

@include('_layouts.footer')

<script src="{{ mix('js/main.js', 'assets/build') }}"></script>

@include('_partials.fathom')
