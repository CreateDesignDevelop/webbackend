@extends('layouts.main')

@section('content')

	<h1>De TODO-app</h1>

	@if(count($items) == 0)
		<p>Nog geen todo-items</p><a href="{!! URL::route('new') !!}">Voeg item toe</a> 
	@else
		<p>
			Wat moet er allemaal gebeuren?<br>
			<a href="{!! URL::route('new') !!}">Voeg item toe</a>
		</p>
	@endif

	@foreach($items as $item)
		{!! Form::open(array('url'=>'todo')) !!}		
			<input 
				type="checkbox"  	
				onclick="this.form.submit()" 				
				{!! $item->done ? 'checked' : '' !!}				
			/>
			<input 
				type="hidden"
				name="id" 
				value="{!! $item->id !!}" 
			/>
			<!-- 
			laravel e() function wraps it in html entities (to make sure no 'sql injection' is possible)  
			makes it a string
			-->
			<p class="itemText {!! $item->done ? "lineThrough" : " " !!}">{!! e($item->name) !!}</p> <span class="deleteLink"><a href="{!! URL::route('delete', $item->id) !!}">X</a><span>
		{!! Form::close() !!}<br/>
	@endforeach

@endsection