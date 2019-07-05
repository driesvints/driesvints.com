@extends('_layouts.master', [
    'title' => $page->title,
    'metaDescription' => $page->metaDescription ?? $page->getExcerpt(160),
])

@section('body')
    @component('_components.header', ['small' => true, 'photo' => 'header-black.jpg'])
    @endcomponent

    <div id="content">
        <div class="py-10 sm:py-20">
            <div id="post">
                <div class="mb-12">
                    <h1 class="font-bold text-4xl mb-6">{{ $page->title }}</h1>
                    <p class="block text-xs uppercase text-gray-600">
                        Published on {{ date('F j, Y', $page->date) }}
                    </p>
                </div>

                @yield('content')
            </div>
        </div>

        @if ($page->getPrevious() ||  $page->getNext())
            <div class="bg-gray-200 text-xl sm:text-2xl border-t border-gray-300 px-6">
                <div class="max-w-4xl mx-auto flex">
                    <div class="flex-1 border-r border-gray-300 pr-6 py-10 sm:py-20">
                        @if ($page->getNext())
                            <p class="uppercase text-sm mb-2">&leftarrow; Previous post</p>
                            <a href="{{ $page->getNext()->getPath() }}">{{ $page->getNext()->title }}</a>
                        @endif
                    </div>
                    <div class="flex-1 text-right px-4 py-10 pl-6 sm:py-20">
                        @if ($page->getPrevious())
                            <p class="uppercase text-sm mb-2">Next post &rightarrow; </p>
                            <a href="{{ $page->getPrevious()->getPath() }}">{{ $page->getPrevious()->title }}</a>
                        @endif
                    </div>
                </div>
            </div>
        @endif

        @include('_partials.about')
    </div>
@endsection
