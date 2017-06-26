<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Examenopdracht Web-Backend</title>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
</head>
<body>
	<div class="container">
		<div id="nav">
			<a href="{!! URL::route('home') !!}">Home</a>
			<div id="right">
			@if(!Auth::check())
				<a href="{!! URL::route('login') !!}">Login |</a>
				<a href="{!! URL::route('register') !!}">Registreer</a>
			@else
				<a href="{!! URL::route('dashboard') !!}">Dashboard |</a>
				<a href="{!! URL::route('todo') !!}">Todo's |</a>
				<a href="{!! URL::route('logout') !!}">Logout ({!! Auth::user()->email !!})</a>
			@endif
			</div>
		</div>
		@yield('content')
		<footer>
			Gemaakt door: Wout Verhoeven
		</footer>
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
</body>
</html>