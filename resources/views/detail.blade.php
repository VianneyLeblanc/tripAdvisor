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
<div id="Vue_ensemble" class="major">
<h1>Vue d'ensemble</h1>
<label>Logement à louer - {{$location->loc_nbchambres}} chambre, {{$location->loc_nbsallesbain}} salles de bains, {{$location->loc_nboccupants}} couchages</label>
<p>
	<label>{{$location->loc_ville}}</label>
	<label>, {{$location->loc_cp}}</label>
	<label>, {{$location->loc_etat}}</label>
</p>
<a href="#"><i class="far fa-envelope"></i>Envoyer à un ami</a>
<p>{{$location->loc_detail}}</p>

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
			<p>Taux de réponse : {{$location->toGerant->grt_tauxreponse}}%</p>
			<p>Délai de réponse : {{$location->toGerant->grt_delaireponse}}</p>
			<p>Inscrit depuis : {{$location->toGerant->grt_dateinscription}}</p>
		</p>
	</div>
	<form>
		<input type="hidden" name="id_proprio" value="">
		<input type="submit" name="submit" value="Envoyer un message">
	</form>
</div>
<div id="Avis" class="major">
	<h1 >Avis</h1>
	<hr>
	@foreach($location->avis as $avis)
	<article style="display: inline-flex; margin: 5px;">
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
<div id="Services" class="major">
	<h1>Services</h1>
	<div style="display: inline-flex;">
		<?php $nb = count($location->toLstEqui); ?>
	@for($i = 0; $i<$nb; $i++)
		@if($i%($nb/3) == 0)
		<ul style="    display: block;">
		@endif
		<li style="display: list-item;"><i class="fas fa-check"></i>
		<label>{{$location->toLstEqui[$i]->equ_libelle}}@if($location->toLstEqui[$i]->eql_nombre>1)
			({{$location->toLstEqui[$i]->eql_nombre}})
			@endif
		</label></li>
		@if($i%($nb/3) == (($nb/3)-1)%($nb/3))
		</ul>
		@endif
	@endfor
	</div>
</div>
<div id="Regles" class="major">
	<h1>Règles de l'établissement</h1>
	
</div>
<div id="Toilettes" class="major">
	<h1>Toilettes</h1>
	
</div>
<div id="Chambres" class="major">
	<h1>Chambres</h1>
	
</div>
<div id="Disponibilité" class="major">
	<h1>Disponibilité</h1>
	<?php echo $calendrier; ?>
</div>
@endsection