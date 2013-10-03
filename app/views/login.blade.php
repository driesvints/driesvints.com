@include('header')

<div class="container">
<div class="row">
	<div class="col-lg-6 col-lg-offset-3">
		<h1>Login to your account</h1>

		{{ Form::open(array('route' => 'login', 'class' => 'form-horizontal')) }}

		<fieldset>
			<div class="form-group">
				{{ Form::label('email', null, array('class' => 'col-lg-2 control-label')) }}
				<div class="col-lg-7">
					{{ Form::email('email', null, array('class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('password', null, array('class' => 'col-lg-2 control-label')) }}
				<div class="col-lg-7">
					{{ Form::password('password', array('class' => 'form-control')) }}

					<div class="checkbox">
						<label>
							{{ Form::checkbox('remember') }} Remember me
						</label>
					</div>

					{{ Form::submit(null, array('class' => 'btn btn-primary')) }}
				</div>
			</div>
		</fieldset>

		{{ Form::close() }}
	</div>
</div>
</div>

@include('footer')