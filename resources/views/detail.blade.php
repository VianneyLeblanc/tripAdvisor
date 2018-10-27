@extends('layouts.app')
@section('content')
<nav>
	<a href="#Vue_ensemble">Vue d'ensemble</a>
	<a href="#Avis">Avis</a>
	<a href="">Services</a>
	<a href="">Disponibilité</a>
	<a href="">Carte</a>
</nav>
<img src="{{$location->loc_img}}">
<div>
<h1 id="Vue_ensemble">Vue d'ensemble</h1>
<label>Logement à louer - {{$location->loc_nbchambres}} chambre, {{$location->loc_nbsallesbain}} salles de bains, {{$location->loc_nboccupants}} couchages</label>
<p>
	<label>{{$location->loc_ville}}</label>
	<label>, {{$location->loc_cp}}</label>
	<label>, {{$location->loc_etat}}</label>
</p>
<a href="#"><i class="far fa-envelope"></i>Envoyer à un ami</a>
<p>{{$location->loc_detail}}</p>
</div>
<div>
	<h1>À propos du propriétaire</h1>
	<hr>
	<div>
		<p>
		<img src="https://vignette.wikia.nocookie.net/bungostraydogs/images/1/1e/Profile-icon-9.png" style="
    border-radius: 50%;
    width: 72px;
">
		<strong>{{preg_split("/ /",$location->toGerant->grt_nom)[0]}}
		{{substr(preg_split("/ /",$location->toGerant->grt_nom)[1],0, 1)}}
	</strong></p>
		<p>
			<p>Taux de réponse : {{$location->toGerant->grt_tauxreponse}}</p>
			<p>Délai de réponse : {{$location->toGerant->grt_delaireponse}}</p>
			<p>Inscrit depuis : {{$location->toGerant->grt_dateinscription}}</p>
		</p>
	</div>
	<form>
		<input type="hidden" name="id_proprio" value="">
		<input type="submit" name="submit" value="Envoyer un message">
	</form>
</div>
<div>
	<h1 id="Avis">Avis</h1>
	<hr>
	@foreach($location->avis as $avis)
	<article style="display: inline-flex;">
		<div style="margin:10px;text-align: center;display: block;">
			<img src="https://vignette.wikia.nocookie.net/bungostraydogs/images/1/1e/Profile-icon-9.png" style="
    border-radius: 50%;
    width: 72px;
">
			<p>{{$avis->toAbonne->abo_pseudo}}
			</p>
			<p>
			{{$avis->toAbonne->abo_ville}}
			</p>
		</div>
		<div>
			<p style="display: inline-flex;">@for($i = 0; $i<$avis->avi_noteglobale; $i++)
				<i class="fas fa-star"></i>
				@endfor
			@for($i = 0; $i< 5- $avis->avi_noteglobale; $i++)
				<i class="far fa-star"></i>
			@endfor
			<label>Avis publié le {{$avis->avi_date}}</label>
			</p>
			<p>{{$avis->avi_titre}}</p>
			<p>{{$avis->avi_detail}}</p>
			<hr>
		</div>
	</article>
	@endforeach
</div>
<div>
	<h1>Services</h1>
	@foreach($location->toLstEqui as $equi)
		<i class="fas fa-check"></i>
		<label>{{$equi->equ_libelle}}({{$equi->pivot->eql_nombre}})</label>

	@endforeach
</div>
@endsection