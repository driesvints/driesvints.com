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
                        <p class="bg-yellow-50 text-center text-sm py-4 rounded">
                            <strong>Draft:</strong> this post is not yet published.
                        </p>
                    @endif

                    <h1 class="font-bold text-4xl mb-6">
                        {{ $post->title }}
                    </h1>

                    <p class="block text-xs uppercase text-gray-500">
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
                    <a target="_blank" rel="noopener" aria-label="Share on Twitter"
                       href="http://twitter.com/share?text={{ urlencode('"'.$post->title.'" by @driesvints - ') }}&url={{ urlencode(route('post', $post)) }}">
                        <x-si-x class="inline w-6 h-6" /></a>

                    <a class="ml-4" target="_blank" rel="noopener" aria-label="Share on Facebook"
                       href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('post', $post)) }}&quote={{ urlencode('"'.$post->title.'" by Dries Vints - ') }}">
                        <x-si-facebook class="inline w-6 h-6" /></a>

                    <a class="ml-4" target="_blank" rel="noopener" aria-label="Share on LinkedIn"
                       href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('post', $post)) }}&title={{ urlencode('"'.$post->title.'" by Dries Vints - ') }}">
                        <x-fab-linkedin class="inline w-6 h-6" /></a>
                </p>
            </div>
        </div>

        @include('partials.about')
    </div>
@endsection
