<!DOCTYPE html>
<html lang="en" class="bg-gray-50">

<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site info -->
@php($title = (isset($title) ? "$title | " : '') . config('app.name'))
<title>{{ $title }}</title>

<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">

<meta property="og:type" content="website">
<meta property="og:title" content="{{ $title }}">
<meta property="og:image" content="{{ asset('/images/driesvints.jpg') }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:locale" content="en_US" />
<meta property="twitter:site" content="@driesvints">
<meta property="twitter:creator" content="@driesvints">
<meta property="twitter:url" content="{{ url()->current() }}">
<meta property="twitter:title" content="{{ $title }}">
<meta property="twitter:image" content="{{ asset('/images/driesvints.jpg') }}">

@isset($metaDescription)
    <meta name="description" content="{{ $metaDescription }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="twitter:description" content="{{ $metaDescription }}">
@endisset

@if (isset($post) && $post->published_at)
    <meta property="article:published_time" content="{{ $post->published_at->format('Y-m-d') }}" />
@endif

<link rel="stylesheet" href="{{ mix('css/app.css') }}">

<script src="{{ mix('js/app.js') }}" defer></script>

@include('partials.fathom')

<div class="font-sans text-xl text-gray-600 leading-normal antialiased border-t-6 border-primary">
    <div class="bg-secondary text-white font-semibold hover:underline py-3 px-6">
        <div class="wrapper text-center">
            <a class="focus:underline focus:bg-transparent" href="https://eventy.io" target="_blank" rel="noopener">
                Check out Eventy, the event platform for the rest of us!
            </a>
        </div>
    </div>

    @yield('body')
</div>

@include('layouts.footer')
