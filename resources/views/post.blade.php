@extends('layouts.base', [
    'title' => $post->title,
    'metaDescription' => $post->excerpt(160),
])

@section('body')
    @component('layouts.header', ['small' => true, 'photo' => 'header-black.jpg'])
    @endcomponent

    <div id="content">
        <div class="py-10 sm:py-20">
            <div id="post">
                <div class="mb-12">
                    @if ($post->isUnpublished())
                        <p class="bg-yellow-100 text-center text-sm py-4 rounded">
                            <strong>Draft:</strong> this post is not yet published.
                        </p>
                    @endif

                    <h1 class="font-bold text-4xl mb-6">
                        {{ $post->title }}
                    </h1>

                    <p class="block text-xs uppercase text-gray-600">
                        @if ($post->published_at)
                            @if ($post->isUpdated())
                                First published
                            @else
                                Published
                            @endif

                            on <strong>{{ $post->published_at->format('F j, Y') }}</strong>

                            @if ($post->isUpdated())
                                &middot; Last updated on <strong>{{ $post->updated_at->format('F j, Y') }}</strong>
                            @endif
                        @else
                            Not yet scheduled
                        @endif

                        @auth
                            <a
                                class="ml-1" aria-label="Edit"
                                href="{{ url("/nova/resources/posts/{$post->id}/edit") }}"
                            >
                                <i class="fas fa-edit"></i>
                            </a>
                        @endauth
                    </p>
                </div>

                {!! $post->content() !!}
            </div>

            <div class="share mx-auto max-w-md mt-10 sm:mt-16 px-6 text-2xl text-center">
                <p class="text-sm italic mb-4">
                    Like what you read? Feel free to share!
                    Make sure to <a href="https://twitter.com/driesvints" target="_blank" rel="noopener">follow me on Twitter</a> to know when my next post is out.
                </p>
                <p class="share-links mb-6">
                    <a class="text-gray-500" target="_blank" rel="noopener" aria-label="Share on Twitter"
                       href="http://twitter.com/share?text={{ urlencode('"'.$post->title.'" by @driesvints - ') }}&url={{ urlencode(route('post', $post)) }}">
                        <i class="enlarge fab fa-twitter"></i>
                    </a>

                    <a class="ml-4 text-gray-500" target="_blank" rel="noopener" aria-label="Share on Facebook"
                       href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('post', $post)) }}&quote={{ urlencode('"'.$post->title.'" by Dries Vints - ') }}">
                        <i class="enlarge fab fa-facebook-f"></i>
                    </a>

                    <a class="ml-4 text-gray-500" target="_blank" rel="noopener" aria-label="Share on LinkedIn"
                       href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('post', $post)) }}&title={{ urlencode('"'.$post->title.'" by Dries Vints - ') }}">
                        <i class="enlarge fab fa-linkedin-in"></i>
                    </a>
                </p>
            </div>
        </div>

        @if ($previous || $next)
            <div class="bg-gray-200 text-xl sm:text-2xl border-t border-gray-300 px-6">
                <div class="max-w-4xl mx-auto flex">
                    <div class="flex-1 text-center sm:text-left border-r border-gray-300 pr-6 py-10 sm:py-20">
                        @if ($previous)
                            <p class="uppercase text-sm mb-2">&leftarrow; Previous post</p>
                            <a href="{{ route('post', $previous) }}">{{ $previous->title }}</a>
                        @endif
                    </div>
                    <div class="flex-1 text-center sm:text-right px-4 py-10 pl-6 sm:py-20">
                        @if ($next)
                            <p class="uppercase text-sm mb-2">Next post &rightarrow; </p>
                            <a href="{{ route('post', $next) }}">{{ $next->title }}</a>
                        @endif
                    </div>
                </div>
            </div>
        @endif

        @include('partials.about')
    </div>
@endsection
