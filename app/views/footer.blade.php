<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <p>Copyright &copy; {{ date('Y') }} Dries Vints</p>
            </div>
            <div class="col-sm-6 last-column">
                <p>
                    <a href="{{ route('page', 'colophon') }}">Colophon</a>
                    / <a href="https://github.com/driesvints/driesvints.com">Source Code</a>
                </p>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/libraries/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libraries/bootstrap-sass-official/assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/libraries/jquery-backstretch/jquery.backstretch.min.js') }}"></script>
<script src="{{ asset('assets/libraries/highlightjs/highlight.pack.js') }}"></script>
<script src="{{ asset('assets/js/script.min.js') }}"></script>
<script>hljs.initHighlightingOnLoad();</script>

</body>
</html>