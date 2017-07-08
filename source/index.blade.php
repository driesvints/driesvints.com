@include('_partials/header', ['metaDescription' => strip_tags($page->bio)])

<div id="header">
    <h1>Dries Vints</h1>
    <h2>Web Developer</h2>
    <p id="about">{!! $page->bio !!}</p>
    <p class="social-media">
        <a href="https://twitter.com/driesvints"><i class="fa fa-twitter"></i></a>
        <a href="https://github.com/driesvints"><i class="fa fa-github"></i></a>
        <a href="https://medium.com/@driesvints"><i class="fa fa-medium"></i></a>
        <a href="https://www.linkedin.com/in/driesvints/"><i class="fa fa-linkedin"></i></a>
        <a href="mailto:dries.vints@gmail.com"><i class="fa fa-paper-plane"></i></a>
    </p>
</div>

@include('_partials/footer')
