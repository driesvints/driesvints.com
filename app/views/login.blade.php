<h1>Login to your account</h1>

{{ Form::open(array('route' => 'login')) }}

<p>
	{{ Form::label('email') }}
	{{ Form::email('email') }}
</p>

<p>
	{{ Form::label('password') }}
	{{ Form::password('password') }}
</p>

{{ Form::submit() }}

{{ Form::close() }}