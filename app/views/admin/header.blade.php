<!doctype html>
<html lang="{{ Config::get('app.locale') }}">
<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width">

	<!-- Site info -->
	<title>Dashboard | Dries Vints</title>

	<!-- Stylsheets -->
	{{ HTML::style('assets/libraries/bootstrap/css/bootstrap.min.css') }}
	{{ HTML::style('assets/libraries/font-awesome/css/font-awesome.min.css') }}
	{{ HTML::style('assets/themes/admin/libraries/bootstrap-datetimepicker-0.0.11/css/bootstrap-datetimepicker.min.css') }}
	{{ HTML::style('assets/themes/admin/css/styles.css') }}
</head>
<body>