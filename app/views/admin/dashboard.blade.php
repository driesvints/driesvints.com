@extends('admin.layout')

@section('content')

<h1>Admin Dashboard</h1>

<p>Welcome to the admin dashboard.</p>

<ul>
	<li>{{ HTML::linkRoute('admin.posts.index', 'Manage Posts') }}</li>
	<li>{{ HTML::linkRoute('admin.pages.index', 'Manage Pages') }}</li>
</ul>

@stop