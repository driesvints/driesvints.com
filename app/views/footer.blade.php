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

<script src="{{ asset('assets/libraries/jquery-1.10.2.min.js') }}"></script>
<script src="{{ asset('assets/libraries/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/libraries/bootstrap-datetimepicker-0.0.11/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('assets/libraries/jquery.backstretch.min.js') }}"></script>
<script src="{{ asset('assets/libraries/highlight.js/highlight.pack.js') }}"></script>
<script src="{{ asset('assets/js/script.min.js') }}"></script>
<script>hljs.initHighlightingOnLoad();</script>

</body>
</html>