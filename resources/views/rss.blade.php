<?php echo "<?xml version=\"1.0\"?>\n"; ?>
<feed xmlns="http://www.w3.org/2005/Atom">
    <title>Dries Vints</title>
    <link href="{{ $page->baseUrl }}{{ $page->site_path }}" />
    <link type="application/atom+xml" rel="self" href="{{ $page->getUrl() }}" />
    <updated>{{ date(DATE_ATOM) }}</updated>
    <id>{{ route('post', $post) }}</id>
    <author>
        <name>Dries Vints</name>
    </author>
    @yield('entries')
</feed>
