<h1>Pages</h1>

<p>{{ HTML::linkRoute('admin', 'Return to dashboard') }}</p>

<p>{{ HTML::linkRoute('admin.pages.create', 'Create page') }}</p>

@if (count($pages))
<table>
	<thead>
		<tr>
			<th>Title</th>
			<th>Slug</th>
			<th>Published At</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($pages as $page)
		<tr>
			<td>{{ $page->title }}</td>
			<td>{{ $page->slug }}</td>
			<td>{{ $page->published_at }}</td>
			<td>
				{{ HTML::linkRoute('pages.show', 'View page', $page->slug, array('target' => '_blank')) }}
				{{ HTML::linkRoute('admin.pages.edit', 'Edit page', $page->id) }}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@else
<p>No pages created yet.</p>
@endif