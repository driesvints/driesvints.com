<h1>Dries Vints</h1>

<h2>
	Freelance Web Developer<br>
	Open-Source Enthusiast<br>
	Available For Hire
</h2>

@if (count($posts))
<h3>Latest Posts</h3>

@foreach ($posts as $post)
<h4>{{ HTML::linkRoute('blog.show', $post->title, $post->slug) }}</h4>

<p>Posted on {{ $post->date('F d, Y') }}</p>

<p>{{ $post->excerpt }}</p>

<p>{{ HTML::linkRoute('blog.show', 'Read more...', $post->slug) }}</p>
@endforeach
@endif