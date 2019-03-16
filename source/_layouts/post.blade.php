@extends('_layouts.master', [
    'title' => $page->title,
])

@section('body')
    @include('_partials.navigation')

    <div class="text-center mb-4">
        <h1 class="mb-4">{{ $page->title }}</h1>
        <p class="italic text-sm">
            Published on {{ date('F j, Y', $page->date) }}
        </p>
    </div>

    <div class="post">
        @yield('content')
    </div>
@endsection
