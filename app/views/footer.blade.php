
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <p>Copyright &copy; {{ date('Y') }} Dries Vints</p>
            </div>
            <div class="col-sm-6 last-column">
                <p>
                    <a href="{{ url('colophon') }}">Colophon</a>
                    / <a href="https://github.com/driesvints/driesvints.com">Source Code</a>
                </p>
            </div>
        </div>
    </div>
</div>

{{ HTML::script('assets/libraries/jquery-1.10.2.min.js') }}
{{ HTML::script('assets/libraries/bootstrap/js/bootstrap.min.js') }}
{{ HTML::script('assets/libraries/bootstrap-datetimepicker-0.0.11/js/bootstrap-datetimepicker.min.js') }}
{{ HTML::script('assets/libraries/jquery.backstretch.min.js') }}
{{ HTML::script('assets/libraries/highlight.js/highlight.pack.js') }}
{{ HTML::script('assets/js/script.min.js') }}
<script>hljs.initHighlightingOnLoad();</script>

</body>
</html>