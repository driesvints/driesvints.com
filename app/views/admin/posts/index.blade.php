<h1>Posts</h1>

<p>{{ HTML::linkRoute('admin', 'Return to dashboard') }}</p>

<p>{{ HTML::linkRoute('admin.posts.create', 'Create post') }}</p>

@if (count($posts))
<table>
	<thead>
		<tr>
			<th>Title</th>
			<th>Slug</th>
			<th>Created at</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($posts as $post)
		<tr>
			<td>{{ $post->title }}</td>
			<td>{{ $post->slug }}</td>
			<td>{{ $post->created_at }}</td>
			<td>
				{{ HTML::linkRoute('blog.show', 'View post', $post->slug, array('target' => '_blank')) }}
				{{ HTML::linkRoute('admin.posts.edit', 'Edit post', $post->id) }}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@else
<p>No posts created yet.</p>
@endif