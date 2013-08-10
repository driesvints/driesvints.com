@extends('layouts.admin')

@section('content')

<h1>Edit Your Account</h1>

{{ Form::model($user, array('route' => array('admin.users.update', $user->id), 'method' => 'PUT')) }}

<div class="row">
	<div class="col-lg-6">
		<fieldset>
			<legend>Personal Information</legend>

			<div class="form-group">
				{{ Form::label('first_name') }}
				{{ Form::text('first_name', null, array('class' => 'form-control')) }}
				{{ $errors->first('first_name') }}
			</div>

			<div class="form-group">
				{{ Form::label('last_name') }}
				{{ Form::text('last_name', null, array('class' => 'form-control')) }}
				{{ $errors->first('last_name') }}
			</div>

			<div class="form-group">
				{{ Form::label('email') }}
				{{ Form::email('email', null, array('class' => 'form-control')) }}
				{{ $errors->first('email') }}
			</div>
		</fieldset>
	</div>

	<div class="col-lg-6">
		<fieldset>
			<legend>Change Password</legend>

			<div class="form-group">
				{{ Form::label('password') }}
				{{ Form::password('password', array('class' => 'form-control')) }}
				{{ $errors->first('password') }}
			</div>

			<div class="form-group">
				{{ Form::label('password_confirmation') }}
				{{ Form::password('password_confirmation', array('class' => 'form-control')) }}
				{{ $errors->first('password_confirmation') }}
			</div>
		</fieldset>

		<fieldset>
			{{ HTML::linkRoute('dashboard', 'Cancel', null, array('class' => 'btn btn-default')) }}
			{{ Form::submit('Save user', array('class' => 'btn btn-primary')) }}
		</fieldset>
	</div>
</div>

{{ Form::close() }}

@stop