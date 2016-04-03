@include('_partials/header')

<div id="page-header">
    <a href="/"><i class="fa fa-home"></i></a>
    <a href="/blog"><i class="fa fa-list"></i></a>
</div>
<div class="clearfix"></div>

<div id="content">
    @yield('body')
</div>

@include('_partials/footer')
