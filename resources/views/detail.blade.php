@extends('layouts.app')
@section('content')
<div style="display: flex;">
<div>
<nav>
	<a href="#Vue_ensemble">Vue d'ensemble</a>
	<a href="#Avis">Avis</a>
	<a href="#Services">Services</a>
	<a href="#Disponibilité">Disponibilité</a>
	<a href="#Carte">Carte</a>
</nav>
<div id="Vue_ensemble" class="major">
<img src="{{$location->loc_img}}">
<h1>Vue d'ensemble</h1>
<label>@if($location->loc_nbchambres == 0) Studio - @else Logement à louer - {{$location->loc_nbchambres}} chambre, @endif  {{$location->loc_nbsallesbain}} salles de bains, {{$location->loc_nboccupants}} couchages</label>
<p>
	<label>{{$location->loc_ville}}</label>
	<label>, {{$location->loc_cp}}</label>
	<label>, {{$location->loc_etat}}</label>
</p>
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
			<p>Inscrit depuis : {{(new \DateTime($location->toGerant->grt_dateinscription))->format('d/m/Y')}}</p>
		</p>
	</div>
	<form action="." method="POST">
		<input type="hidden" name="id_proprio" value="">
		<input type="submit" name="submit" value="Envoyer un message">
	</form>
</div>
<div id="Avis" class="major">
	<h1 >Avis</h1>
	<hr>
	<form action="" method="POST" style="display: inline-flex;">
		<input type="hidden" name="typeTriAvis" value="typeTriAvis">
		<label for="TriAvis">Trié par &#160</label>
		<select id="TriAvis" name="TriAvis" size="1">
			<option selected>Date</option>
			<option>Note (croissante)</option>
			<option>Note (décroissante)</option>
		</select>
	</form>
	@foreach($location->avis as $avis)
	<article style="display: inline-flex; margin: 5px;" data-note="{{$avis->avi_noteglobale}}" data-date="{{$avis->avi_date}}">
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
			<label>Avis publié le {{(new \DateTime($avis->avi_date))->format('d/m/Y')}}</label>
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
		<?php $nb = count($location->toLstEqui);
		$listeEqui =  $location->toLstEqui ; ?>
	@for($i = 0; $i<$nb; $i++)
		@if($i%($nb/3) == 0)
		<ul style="    display: block;">
		@endif
		<li style="display: list-item;"><i class="fas fa-check"></i>
		<label>{{$listeEqui[$i]->equ_libelle}}@if($listeEqui[$i]->eql_nombre>1)
			({{$listeEqui[$i]->eql_nombre}})
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
	<p>Pas de détail disponible</p>
</div>
<div id="Toilettes" class="major">
	<h1>Toilettes</h1>
	<p>Pas de détail disponible</p>
</div>
<div id="Chambres" class="major">
	<h1>Chambres</h1>
	<p>Pas de détail disponible</p>
</div>
<div id="Disponibilité" class="major">
	<h1>Disponibilité</h1>
	<?php echo $calendrier; ?>
</div>
<div id="Carte" class="major">
	<h1>Carte</h1>
	<div>
     <iframe width="100%" height="400" frameborder="0" src="https://www.bing.com/maps/embed?h=400&w=500&cp={{$location->loc_latitude}}~{{$location->loc_longitude}}&lvl=13&typ=d&sty=r&src=SHELL&FORM=MBEDV8" scrolling="no">
     </iframe>

</div>
</div>
</div>

<div class="major aside">
    <div>
	<form action="." method="POST">
		<div id="calendarSelector1_{{$location->loc_id}}" class="hidden">
	    	<span id="previous" class="button" value="<" onclick="previousMonth('calendarSelector1')" data-nb="0">&#160 &lt &#160</span>
	    	<span class="button" id="next" value=">" onclick="nextMonth('calendarSelector1_{{$location->loc_id}}')" data-nb="1">&#160 &gt &#160</span>
    	<?php echo $calendrier ?>
    </div>
		<div class="inputDate">
			<input placeholder="Arriver" type="text" name="dateArrivee{{$location->loc_id}}" onclick="showCalendarArrive()" value="" readonly>
			<i class="fas fa-calendar-alt internal" onclick="showCalendarArrive('_'+{{$location->loc_id}})"></i>
		</div>
		<div class="inputDate">
			<input placeholder="Départ" type="text" name="dateDepart{{$location->loc_id}}" onclick="showCalendarDepart()" value="" readonly>
			<i class="fas fa-calendar-alt internal" onclick="showCalendarDepart('_'+{{$location->loc_id}})"></i>
		</div>
		<div id="calendarSelector2_{{$location->loc_id}}" class="hidden">
	    	<span id="previous" class="button" value="<" onclick="previousMonth('calendarSelector2_{{$location->loc_id}}')" data-nb="0">&#160 &lt &#160</span>
	    	<span class="button" id="next" value=">" onclick="nextMonth('calendarSelector2_{{$location->loc_id}}')" data-nb="1">&#160 &gt &#160</span>
    	<?php echo $calendrier ?>
    </div>
		<input style="margin: 1px;" type="number" name="nbAdultes" min="1" max="99">
		<input style="margin: 1px;" type="number" name="nbEnfants" min="0" max="99">
		<p>Tarif pour 1 nuit</p>
		@if($tarifMin != null)
    <p>A partir de {{$tarifMin->tar_prix}}€ / semaine</p>
    @else
    <p>Prix non renseigné</p>
    @endif
		<input style="margin: 1px;" type="submit" name="submit" value="Réservez">
	</form>
	<form action="." method="POST">
		<input type="submit" name="submit" value="Envoyer un message">
	</form>
	</div>
</div>
</div>
@endsection