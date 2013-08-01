@extends('admin.layout')

@section('content')

{{ HTML::linkRoute('admin.posts.create', 'Create new post', null, array('class' => 'btn btn-primary pull-right btn-create')) }}

<h1>Posts</h1>

@if (count($posts))
<table class="table">
	<thead>
		<tr>
			<th>Title</th>
			<th>Slug</th>
			<th>Published At</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($posts as $post)
		<tr>
			<td>{{ $post->title }}</td>
			<td>{{ $post->slug }}</td>
			<td>{{ $post->published_at }}</td>
			<td>
				{{ HTML::linkRoute('posts.show', 'View post', $post->slug, array('target' => '_blank', 'class' => 'btn btn-info btn-small')) }}
				{{ HTML::linkRoute('admin.posts.edit', 'Edit post', $post->id, array('class' => 'btn btn-warning btn-small')) }}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@else
<p>No posts created yet.</p>
@endif

@stop