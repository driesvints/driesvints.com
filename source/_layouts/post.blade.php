@extends('_layouts.master', [
    'title' => $page->title,
])

@section('body')
    @component('_components.header', ['small' => true, 'photo' => 'header-black.jpg'])
    @endcomponent

    <div id="content" class="px-6 py-10 sm:py-20">
        <div class="max-w-2xl mx-auto mb-12">
            <h1 class="font-bold text-4xl mb-6">{{ $page->title }}</h1>
            <p class="block text-xs uppercase text-gray-600">
                Published on {{ date('F j, Y', $page->date) }}
            </p>
        </div>

        <div id="post">
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
    </div>
@endsection
