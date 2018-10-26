@extends('layouts.app')
@section('search')
@section('content')
<h2>Résultat de la recherche</h2>
@foreach( $location as $loc)
	<div class="location">
		<img src="http://www.piniswiss.com/wp-content/uploads/2013/05/image-not-found-4a963b95bf081c3ea02923dceaeb3f8085e1a654fc54840aac61a57a60903fef-300x199.png">
		<div>
			<div class="title">{{$loc->loc_titre}}</div>
			<div><strong>{{$loc->loc_nbchambre}} chambre, {{$loc->loc_nbsallesbain}} salles de bains, {{$loc->loc_nboccupants}} couchages</strong></div>
			<div>@for($i = 1;$i<10;$i++)
				{{preg_split("/ /",$loc->loc_description)[$i]}}
				@endfor
			{{'...'}}</div>
			<a href="./id/?id={{$loc->loc_id}}"><div class="Affichage">Affichage rapide</div></a>
		</div>	
	</div>
@endforeach
@endsection
@endsection