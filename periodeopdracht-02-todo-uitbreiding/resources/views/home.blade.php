@extends('layouts.main')

@section('content')

	<h1>Welkom op de tweede periode-opdracht</h1>

	@if (session('success'))
		<div class="flash-message">
			Je bent succesvol uitgelogd
		</div>
	@endif

	<p>Registreer eerst even om te zien wat de opdracht juist omvat</p>
	<h4>Opzet</h4>
	<p>	
	    Alles wat je hier ziet, moet je nabouwen.<br>
	    Het gaat om de functionaliteit, css mag je kopiëren.<br><br>
	    Deze opdracht is met Laravel gemaakt. Je mag uiteraard zelf kiezen hoe je aan de opdracht begint: dat mag vanaf scratch, met CodeIgniter met Laravel of met een ander framework, zolang het eindresultaat maar hetzelfde is.<br><br>
	    Het is de bedoeling dat je de basisfunctionaliteiten werkende krijgt. De details (zoals rangschikken van de TODO resultaten, (error-)boodschappen, ...) zijn details waar je je pas mee moet bezig houden van zodra de basis-functionaliteit goed zit.<br><br>
		Succes!
	</p>

@endsection