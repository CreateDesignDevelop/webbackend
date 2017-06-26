@extends('layouts.main')

@section('content')

	<h1>Your items <br><small><a href="{!! URL::route('new') !!}">New Task</a></small> </h1>
	
	@foreach($items as $item)
		{!! Form::open(array('url'=>' ')) !!}<br/>		
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
			{!! e($item->name) !!} <span class="deleteLink"><a href="{!! URL::route('delete', $item->id) !!}">X</a><span>
		{!! Form::close() !!}<br/>
	@endforeach

@stop