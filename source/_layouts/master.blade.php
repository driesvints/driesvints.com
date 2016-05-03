@include('_partials/header')

<div id="page-header">
    <div class="inner">
        <div class="navigation">
            <a href="/" title="Home"><i class="fa fa-home"></i></a> ·
            <a href="/blog" title="Blog"><i class="fa fa-list"></i></a>
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
                        <a href="https://github.com/driesvints/driesvints.com/edit/master/source/{{ $edit }}.md"
                            title="Edit this page">
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
