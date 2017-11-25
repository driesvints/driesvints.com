@include('_partials/header')

<div id="content">
    <h1>{{ $page->title }}</h1>

    @yield('content')
</div>

@include('_partials/footer')
