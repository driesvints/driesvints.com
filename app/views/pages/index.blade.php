@extends('layouts.admin')

@section('content')

{{ HTML::linkRoute('admin.pages.create', 'Create new page', null, array('class' => 'btn btn-primary pull-right btn-create')) }}

<h1>Pages</h1>

@if (count($pages))
<table class="table">
	<thead>
		<tr>
			<th>Title</th>
			<th>Slug</th>
			<th>Last Modified At</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($pages as $page)
		<tr>
			<td>{{ $page->title }}</td>
			<td>{{ $page->slug }}</td>
			<td>{{ $page->updated_at->toDayDateTimeString() }}</td>
			<td>
				{{ HTML::linkRoute('pages.show', 'View page', $page->slug, array('target' => '_blank', 'class' => 'btn btn-info btn-small')) }}
				{{ HTML::linkRoute('admin.pages.edit', 'Edit page', $page->id, array('class' => 'btn btn-warning btn-small')) }}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

{{ $pages->links() }}

@else
<p>No pages created yet.</p>
@endif

@stop