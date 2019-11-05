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

                <div class="share mx-auto max-w-xs mt-10 sm:mt-16 text-2xl text-center">
                    <p class="text-sm italic">
                        Like what you read? Feel free to share!
                    </p>
                    <p>
                        <a target="_blank"
                           href="http://twitter.com/share?text={{ urlencode('"'.$page->title.'" by @driesvints - ') }}&url={{ urlencode($page->getUrl()) }}">
                            <i class="enlarge fab fa-twitter"></i>
                        </a>

                        <a class="ml-2" target="_blank"
                           href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($page->getUrl()) }}&quote={{ urlencode('"'.$page->title.'" by Dries Vints - ') }}">
                            <i class="enlarge fab fa-facebook-f"></i>
                        </a>

                        <a class="ml-2" target="_blank"
                           href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode($page->getUrl()) }}&title={{ urlencode('"'.$page->title.'" by Dries Vints - ') }}">
                            <i class="enlarge fab fa-linkedin-in"></i>
                        </a>
                    </p>
                </div>
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
