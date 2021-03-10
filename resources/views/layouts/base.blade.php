<!DOCTYPE html>
<html lang="en" class="bg-gray-100">

<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site info -->
@php($title = (isset($title) ? "$title | " : '') . config('app.name'))
<title>{{ $title }}</title>

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

@include('feed::links')

<link rel="stylesheet" href="{{ mix('css/app.css') }}">

<script src="{{ mix('js/app.js') }}" defer></script>

@include('partials.fbvideo')
@include('partials.fathom')

<div class="font-sans text-xl text-gray-700 leading-normal antialiased border-t-6 border-primary">
{{--    <div class="bg-secondary text-white font-semibold hover:underline py-3 px-6">--}}
{{--        <div class="wrapper text-center">--}}
{{--            <a class="focus:underline focus:bg-transparent" href="https://blade-ui-kit.com" target="_blank" rel="noopener">--}}
{{--                I've just launched Blade UI Kit, a new Laravel package--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </div>--}}

    @yield('body')
</div>

@include('layouts.footer')
