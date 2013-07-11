<h1>{{ $title }}</h1>

@if (count($items))
	@foreach ($items as $item)
	<h2>{{ HTML::linkRoute('blog.show', $item->title, $item->slug) }}</h2>

	<p>Posted on {{ $item->date('F d, Y') }}</p>

	<p>{{ $item->excerpt }}</p>

	<p>{{ HTML::linkRoute('blog.show', 'Read more...', $item->slug) }}</p>
	@endforeach
@endif