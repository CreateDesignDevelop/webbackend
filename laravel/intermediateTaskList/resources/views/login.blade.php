@extends('layouts.app')

@section('content')

	{{Form::open()}}
		<input type="text" name="username" placeholder="unsername">
		<input type="password" name="password" placeholder="password">
		<input type="submit" value="SignIn">
	{{Form::close()}}

@stop