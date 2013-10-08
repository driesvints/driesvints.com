<!doctype html>
<html lang="{{ Config::get('app.locale') }}">
<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width">

	<!-- Site info -->
	<title>Dries Vints</title>

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
</head>

@if (is_home())
<body class="home">
@else
<body>
@endif

@if (Auth::check())
	@include('toolbar')
@endif