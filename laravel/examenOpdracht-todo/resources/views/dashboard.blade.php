@extends('layouts.main')

@section('content')
	<h1>Dashboard</h1>

	@if (session('success'))
		<div class="flash-message">
			Je bent succesvol Ingelogd
		</div>
	@endif

	<p>
		Dit is de applicatie die je moet maken: <a href="{!! URL::route('todo') !!}">Todo's</a>
	</p>

@endsection