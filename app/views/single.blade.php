@extends('layouts.public')

@section('content')

<div class="single-post">
    <p class="post-info">
        <small>
            {{ $item->date('F d, Y') }}
    
            @if (count($item->tags))
            &bull; Tags: {{ $item->listTags() }}
            @endif
        </small>
    </p>

    <h1>{{ $item->title }}</h1>

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
</div>

@stop