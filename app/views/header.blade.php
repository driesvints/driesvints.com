<!doctype html>
<html lang="{{ Config::get('app.locale') }}">
<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Site info -->
	<title>{{ $pageTitle }}</title>
    @if (! empty($metaDescription))
    <meta name="description" content="{{ $metaDescription }}">
    @endif

	<!-- Favicons -->
	<meta name="msapplication-TileColor" content="#2F3238">
	<meta name="msapplication-TileImage" content="{{ url('assets/images/touch-icon-144×144-precomposed.png') }}">
	<link rel="apple-touch-icon-precomposed" sizes="152×152" href="{{ url('assets/images/touch-icon-152×152-precomposed.png') }}" />
	<link rel="apple-touch-icon-precomposed" sizes="144×144" href="{{ url('assets/images/touch-icon-144×144-precomposed.png') }}" />
	<link rel="apple-touch-icon-precomposed" sizes="120×120" href="{{ url('assets/images/touch-icon-120×120-precomposed.png') }}" />
	<link rel="apple-touch-icon-precomposed" sizes="114×114" href="{{ url('assets/images/touch-icon-114×114-precomposed.png') }}" />
	<link rel="apple-touch-icon-precomposed" sizes="72×72" href="{{ url('assets/images/touch-icon-72×72-precomposed.png') }}" />
	<link rel="apple-touch-icon-precomposed" href="{{ url('assets/images/touch-icon-iphone-precomposed.png') }}" />
	<link rel="icon" sizes="32x32" href="{{ url('assets/images/favicon-32.png') }}">
	<link rel="shortcut icon" href="{{ url('assets/images/favicon.ico') }}">

	<!-- Stylsheets -->
	{{ HTML::style('assets/libraries/bootstrap/css/bootstrap.min.css') }}
	{{ HTML::style('assets/libraries/font-awesome/css/font-awesome.min.css') }}
	{{ HTML::style('assets/libraries/bootstrap-datetimepicker-0.0.11/css/bootstrap-datetimepicker.min.css') }}
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
	{{ HTML::style('assets/libraries/highlight.js/styles/solarized_dark.css') }}
	{{ HTML::style('assets/css/styles.css') }}

    <!-- Scripts -->
    <script type="text/javascript" src="//use.typekit.net/rzl7dlz.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		{{ HTML::script('assets/libraries/html5shiv.min.js') }}
		{{ HTML::script('assets/libraries/respond.min.js') }}
	<![endif]-->
</head>

@if (is_home())
<body class="home">
@else
<body>
@endif

@if (Auth::check())
	@include('toolbar')
@endif

<div class="wrapper">