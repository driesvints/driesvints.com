@extends('admin.layout')

@section('content')

<h1>Edit Post</h1>

{{ Form::model($post, array('route' => array('admin.posts.update', $post->id), 'method' => 'PUT')) }}

<div class="row">
	<div class="col-lg-9">
		<fieldset>
			<div class="form-group">
				{{ Form::label('title') }}
				{{ Form::text('title', null, array('class' => 'form-control')) }}
				{{ $errors->first('title') }}
			</div>

			<div class="form-group">
				{{ Form::label('slug') }}
				{{ Form::text('slug', null, array('class' => 'form-control')) }}
				{{ $errors->first('slug') }}
			</div>

			<div class="form-group">
				{{ Form::label('body') }}
				{{ Form::textarea('body', null, array('class' => 'form-control')) }}
			</div>
		</fieldset>
	</div>

	<div class="col-lg-3">
		<fieldset>
			<div class="form-group">
				{{ Form::label('status') }}
				{{ Form::select('status', $statuses, null, array('class' => 'form-control')) }}
				{{ $errors->first('status') }}
			</div>

			<div class="form-group">
				{{ Form::label('published_at') }}
				{{ Form::text('published_at', Input::old('published_at', date('Y-m-d H:i:s')), array('class' => 'form-control')) }}
				{{ $errors->first('published_at') }}
			</div>

			{{ HTML::linkRoute('admin.posts.index', 'Cancel', null, array('class' => 'btn btn-default')) }}
			{{ Form::submit('Save post', array('class' => 'btn btn-primary')) }}
		</fieldset>
	</div>
</div>

{{ Form::close() }}

@stop