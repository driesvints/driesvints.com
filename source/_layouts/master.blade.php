@include('_partials/header')

<div id="page-header">
    <div class="inner">
        <div class="navigation">
            <a href="/"><i class="fa fa-home"></i></a> ·
            <a href="/blog"><i class="fa fa-list"></i></a>
        </div>
        <div class="meta">
            @if (isset($date))
                <div class="date">
                    {{ $date->format('F d, Y') }}
                </div>
            @endif

            <h1>
                {{ $title }}

                @if (isset($edit))
                    <sup>
                        <a href="https://github.com/driesvints/driesvints.com/edit/jigsaw/source/blog/{{ $edit }}.md">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </sup>
                @endif
            </h1>
        </div>
    </div>
</div>

<div id="content">
    @yield('content')
</div>

@include('_partials/footer')
