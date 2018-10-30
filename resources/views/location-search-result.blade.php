@extends('layouts.app')
@section('content')
<h2>Résultat de la recherche</h2>
<div class="major" style="display: flex;">
	<form action="" method="POST">
		<div>
			<h1>Lieu</h1>
			<select name="rayon">
				<option selected>N'importe quelle distance</option>
				<option>0.5 Km</option>
				<option>1 Km</option>
				<option>3 Km</option>
				<option>5 Km</option>
				<option>10 Km</option>
				<option>25 Km</option>
			</select>
			<label>De</label>
			<input type="text" name="ville" placeholder="Annecy">
			<hr>
			<h1>Prix par nuit</h1>
			<div style="display: inline-flex;">
				<label>{{$prixMin}}€</label>
				<input type="range" name="points" min="{{$prixMin}}" max="{{$prixMax}}">
				<label>{{$prixMax}}€</label>
			</div>
			<hr>
			<h1>Caractéristiques</h1>
			@foreach($allCara as $cara)
			<div style="display: inline-flex;">
				<input type="checkbox" name="caractéristique" value="{{$cara->vil_id}}">
				<label>{{$cara->vil_libelle}}</label>
			</div>
			@endforeach
			<hr>
			<h1>Services</h1>
			@foreach($allEqui as $equi)
			<div style="display: inline-flex;">
				<input type="checkbox" name="equipements" value="{{$equi->equ_id}}">
				<label>{{$equi->equ_libelle}}</label>
			</div>
			@endforeach
		</div>
	</form>
</div>
@foreach( $location as $loc)
<div style="display: flex;">
	<div class="major location" style="margin-right:0px;">
		<img src="http://www.piniswiss.com/wp-content/uploads/2013/05/image-not-found-4a963b95bf081c3ea02923dceaeb3f8085e1a654fc54840aac61a57a60903fef-300x199.png">
		<div class="">
			<div class="title">{{$loc[0]->loc_titre}}</div>
			<div><strong>{{$loc[0]->loc_nbchambres}} chambre, {{$loc[0]->loc_nbsallesbain}} salles de bains, {{$loc[0]->loc_nboccupants}} couchages</strong></div>
			<div>@for($i = 1;$i<10;$i++)
				{{preg_split("/ /",$loc[0]->loc_description)[$i]}}
				@endfor
			{{'...'}}</div>
			<a href="./{{$loc[0]->loc_id}}"><div class="Affichage">Affichage rapide</div></a>
		</div>
	</div>
	<div class="major aside" style="display: inline-block; position: unset; margin-top: 10px;">
    <div style="margin-top: 5vh; margin-right: 20px;">
	<form action="./{{$loc[0]->loc_id}}">
    @if($loc['tarifMin'] != null)
    <p>A partir de {{$loc['tarifMin']->tar_prix}}€ / semaine</p>
    @else
    <p>Prix non renseigné</p>
    @endif
		<input style="margin: 3px;    width: 100%;" type="submit" name="submit" value="Réservez">
	</form>
	</div>
</div>
</div>
@endforeach
@endsection