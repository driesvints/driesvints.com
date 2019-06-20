@extends('_layouts.master', [
    'title' => $page->title,
])

@section('body')
    <div class="text-center mb-12">
        <h1 class="mb-4">{{ $page->title }}</h1>
        <p class="italic text-sm">
            Published on {{ date('F j, Y', $page->date) }}
        </p>
    </div>

    <div class="post max-w-md m-auto">
        @yield('content')

        @if ($page->getPrevious() ||  $page->getNext())
            <p class="text-center text-sm mt-12">
                @if ($page->getNext())
                    <a href="{{ $page->getNext()->getPath() }}">&laquo; {{ $page->getNext()->title }}</a>
                @endif

                @if ($page->getPrevious() && $page->getNext())
                    |
                @endif

                @if ($page->getPrevious())
                    <a href="{{ $page->getPrevious()->getPath() }}">{{ $page->getPrevious()->title }} &raquo;</a>
                @endif
            </p>
        @endif
    </div>
@endsection
