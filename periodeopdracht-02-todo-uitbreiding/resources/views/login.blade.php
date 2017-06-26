@extends('layouts.main')

@section('content')
	<h1>Login</h1>

	@foreach($errors->all() as $error)
		<p class="error">{{$error}}</p>
	@endforeach

	{!! Form::open(array('autocomplete'=>'off')) !!}
		<input type="text" name="email" placeholder="Email">
		<input type="password" name="password" placeholder="Password">
		<input type="submit" value="Log In">
	{!! Form::close() !!}

@endsection