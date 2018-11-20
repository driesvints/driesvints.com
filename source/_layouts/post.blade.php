@extends('_layouts.master', [
    'title' => $page->title,
])

@section('body')
    <div id="content">
        <h1>{{ $page->title }}</h1>

        @yield('content')
    </div>
    <script src="{{ mix('js/highlighting.js', 'assets/build') }}"></script>
@endsection
