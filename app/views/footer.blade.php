<div id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-4 avatar">
                <img class="img-circle" src="http://www.gravatar.com/avatar/e8321183acdf47a9ce838afd13a964b5.jpg?s=300" alt="">
            </div>
            <div class="col-md-8">
                <h2>About Dries</h2>

                <p>Hi, I'm Dries. A <strong>web developer</strong> from Belgium.</p>
 
                <p>
                    I spend most of my days working as a freelancer and collaborating on <strong>open-source</strong> projects. I work mostly with PHP and <a href="http://laravel.com/">the Laravel framework</a>. I'm a very active member of the Laravel community.
                </p>
 
                <p>
                    I also do a weekly newsletter called <a href="http://laravelweekly.com">&ldquo;Laravel Weekly&rdquo;</a> at <a href="http://laravel.io">Laravel.io</a> and write documentation manuals for <a href="http://cartalyst.com">Cartalyst</a>.
                </p>
 
                <p>
                    I hang out a lot on <a href="http://laravel.io/irc">the #laravel IRC channel</a> so why don't you drop by and come say hi!
                </p>
            </div>
        </div>
    </div>
</div>

<div id="contact">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-xs-6">
                <a href="https://twitter.com/driesvints"><i class="icon-twitter"></i>
            </div>
            <div class="col-sm-3 col-xs-6">
                <a href="https://github.com/driesvints"><i class="icon-github"></i></a>
            </div>
            <div class="col-sm-3 col-xs-6">
                <a href="mailto:dries.vints@gmail.com"><i class="icon-envelope"></i></a>
            </div>
            <div class="col-sm-3 col-xs-6">
                <a href="http://www.linkedin.com/in/driesvints"><i class="icon-linkedin"></i></a>
            </div>
        </div>
    </div>
</div>

<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <p>Copyright &copy; {{ date('Y') }} Dries Vints</p>
            </div>
            <div class="col-sm-6 last-column">
                <p><a href="#header">back to top</a></p>
            </div>
        </div>
    </div>
</div>

{{ HTML::script('assets/libraries/jquery-1.10.2.min.js') }}
{{ HTML::script('assets/libraries/bootstrap/js/bootstrap.min.js') }}
{{ HTML::script('assets/libraries/bootstrap-datetimepicker-0.0.11/js/bootstrap-datetimepicker.min.js') }}
{{ HTML::script('assets/libraries/jquery.backstretch.min.js') }}
{{ HTML::script('assets/libraries/highlight.js/highlight.pack.js') }}
{{ HTML::script('assets/js/script.js') }}
<script>hljs.initHighlightingOnLoad();</script>

<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-18478762-2']);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>

</body>
</html>