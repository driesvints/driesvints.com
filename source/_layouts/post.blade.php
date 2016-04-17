@extends('_layouts.master')

@section('content')
    <h1>{{ $title }}</h1>

    @yield('body')

    <div id="disqus_thread"></div>
    <script type="text/javascript">
        var disqus_shortname = '{{ $production ? 'driesvints' : 'driesvintstesting' }}';
        var disqus_identifier = '{{ $slug }}';

        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
@endsection
