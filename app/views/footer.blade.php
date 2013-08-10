	<hr>
	
	<div class="row">
		<div class="col-lg-12">
			<p class="pull-left">Copyright &copy; {{ date('Y') }} Dries Vints</p>
	
			<p class="pull-right"><a href="#">back to top</a></p>
		</div>
	</div>
</div>

{{ HTML::script('assets/libraries/jquery-1.10.2.min.js') }}
{{ HTML::script('assets/libraries/bootstrap/js/bootstrap.min.js') }}
{{ HTML::script('assets/libraries/bootstrap-datetimepicker-0.0.11/js/bootstrap-datetimepicker.min.js') }}
{{ HTML::script('assets/js/script.js') }}

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