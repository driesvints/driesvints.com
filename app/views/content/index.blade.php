<h1>{{ $title }}</h1>

@if (count($items))
	@foreach ($items as $item)
	<h2>{{ HTML::linkRoute('blog.show', $item->title, $item->slug) }}</h2>

	<p>Posted on {{ $item->date }}</p>

	{{ $item->body }}
	@endforeach
@endif