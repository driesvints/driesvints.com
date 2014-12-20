@include('header')

<div id="page-header">
    <a href="{{ route('home') }}"><i class="fa fa-home"></i></a>
    <a href="{{ route('blog') }}"><i class="fa fa-list"></i></a>
</div>
<div class="clearfix"></div>

<div id="content">
    @yield('content')
</div>

@include('footer')