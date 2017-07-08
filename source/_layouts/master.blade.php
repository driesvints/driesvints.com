@include('_partials/header')

<div id="content">
    <h1>{{ $page->title }}</h1>

    @yield('content')

    <p>Copyright &copy; {{ date('Y') }} Dries Vints</p>
</div>

@include('_partials/footer')
