@extends('layouts.master')

@section('content')
	<h1>Create an account</h1>
	<form method="POST" action="{{ action('Auth\AuthController@postRegister') }}">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" name="name" id="name">
			@include ('partials.errors', ['field' => 'name'])
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="text" class="form-control" name="email" id="email">
			@include ('partials.errors', ['field' => 'email'])
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" name="password" id="password">
			@include ('partials.errors', ['field' => 'password'])
		</div>
		{{--<div class="form-group">--}}
			{{--<label for="password2">Password Confirmation</label>--}}
			{{--<input type="password" class="form-control" name="password2" id="password2">--}}
			{{--@include ('partials.errors', ['field' => 'password'])--}}
		{{--</div>--}}
		<button type="submit" class="btn btn-primary">Submit</button>

	</form>
@stop