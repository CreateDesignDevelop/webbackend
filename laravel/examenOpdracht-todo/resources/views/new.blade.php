@extends('layouts.main')

@section('content')
	<h1>Voeg een TODO-item toe<br>
	<small><a href="{!! URL::route('todo') !!}">Terug naar mijn TODO's</a></small>
	</h1>

	@foreach($errors->all() as $error)
		<p class="error">{{$error}}</p>
	@endforeach
	
	<p>Wat moet er gedaan worden?</p>
	{!! Form::open() !!}
		<input type="text" name="name" placeholder="De naam van je Todo" />
		<input type="submit" value="Toevoegen!" />
	{!! Form::close() !!}

@endsection