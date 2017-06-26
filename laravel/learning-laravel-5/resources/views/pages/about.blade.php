@extends('app')

@section('content')

<h1>about</h1>
<h1>people i like</h1>
<ul>
	@foreach($people as $person)
		<li>{{$person}}</li>
	@endforeach
</ul>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut laborum cupiditate voluptatibus, molestias perferendis accusantium, vel repudiandae officiis itaque vero sunt distinctio corporis possimus accusamus consequatur tenetur, iusto sint. Dolorem.</p>
@stop