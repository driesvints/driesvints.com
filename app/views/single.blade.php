@extends('layouts.public')

@section('content')

<h2>{{ $item->title }}</h2>

<p>
	<small class="post-info">
		{{ $item->date('F d, Y') }}

		@if (isset($tags) && ! empty($tags))
		| Tagged in: {{ $tags }}
		@endif
	</small>
</p>

{{ $item->body }}

@if ( ! $item->disable_comments)
<div id="disqus_thread"></div>
<script type="text/javascript">
	var disqus_shortname = 'driesvints';

	(function() {
		var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
		dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
		(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
	})();
</script>
@endif

@stop