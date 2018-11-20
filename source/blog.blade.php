@extends('_layouts.master', ['title' => 'Blog'])

@section('body')
    <div id="content">
        <h1>Blog</h1>

        <h3>{{ $year = date('Y', $posts->first()->date) }}</h3>

        <ul>
            @foreach ($posts as $post)
                @if (date('Y', $post->date) !== $year)
                    @php($year = date('Y', $post->date))
        </ul>

        <h3>{{ $year }}</h3>
        <ul>
            @endif
                <li><a href="{{ $post->getPath() }}">{{ $post->title }}</a></li>
            @endforeach
        </ul>

        @include('_partials.footer')
    </div>
@endsection
