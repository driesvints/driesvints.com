<h1>Dries Vints</h1>

<h2>
	Freelance Web Developer<br>
	Open-Source Enthusiast<br>
	Available For Hire
</h2>

@if (count($posts))
	<h1>Latest Posts</h1>
	
	@foreach ($posts as $post)
		@include('posts.excerpt')
	@endforeach
@endif