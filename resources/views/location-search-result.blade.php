@extends('layouts.app')
@extends('header')
@section('content')
    <h2>Résultat de la recherche</h2>
    @foreach( $location as $loc)
    	<div style="margin: 10px; display: inline-flex; border: solid 2px;">
    		<img style=" " src="http://www.piniswiss.com/wp-content/uploads/2013/05/image-not-found-4a963b95bf081c3ea02923dceaeb3f8085e1a654fc54840aac61a57a60903fef-300x199.png">
    		<div>
    			<div>{{$loc->loc_titre}}</div>
    			<div><strong>{{$loc->loc_nbchambre}} chambre, {{$loc->loc_nbsallesbain}} salles de bains, {{$loc->loc_nboccupants}} couchages</strong></div>
    			<div>{{$loc->loc_description}}</div>
    			<div>Affichage rapide</div>
    		</div>	
    	</div>
    @endforeach
@endsection
