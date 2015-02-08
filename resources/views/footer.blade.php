<div id="contact">
    <div class="inner-box">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-4">
                    <a href="https://twitter.com/driesvints"><i class="fa fa-twitter"></i></a>
                </div>
                <div class="col-xs-4">
                    <a href="https://github.com/driesvints"><i class="fa fa-github"></i></a>
                </div>
                <div class="col-xs-4">
                    <a href="mailto:dries.vints@gmail.com"><i class="fa fa-envelope"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="footer">
    <div class="container">
        <p>
            Copyright &copy; {{ date('Y') }} Dries Vints<br/>

            @if (! App::isDownForMaintenance())
                <a href="{{ route('page', 'colophon') }}">Colophon</a> ·
            @endif

            <a href="https://github.com/driesvints/driesvints.com">Source Code</a>
        </p>
    </div>
</div>

<script src="{{ elixir('js/app.js') }}"></script>
<script>hljs.initHighlightingOnLoad();</script>

</body>
</html>