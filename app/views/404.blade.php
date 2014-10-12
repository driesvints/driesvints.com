@include('header')

<div id="error-page" class="container">
    <h1>Woops, looks like this page doesn't exists!</h1>
    <a class="btn btn-default" href="{{ route('home') }}"><i class="icon-chevron-left"></i> Return to homepage</a>
</div>

@include('footer')