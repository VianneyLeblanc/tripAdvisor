@extends('layouts.app')
@section('content')
<form action="." method="POST">
<div class="major">
	<h1>1 Vos informations</h1>
	<div>
		<label id="lblNom" for="nom">Votre nom complet <span class="required">*</span></label>
		<input type="text" name="nom" required="true">
		<label for="tel">Numéro de téléphone <span class="required">*</span></label>
		<input type="tel" name="tel">
		<label for="email">Adresse e-mail</label>
 		<input type="email" name="email" id="email" title="Indiquez votre e-mail" required="true">
 		<label>Message personnel pour {{preg_split("/ /",$location->toGerant->grt_nom)[0]}}
		{{substr(preg_split("/ /",$location->toGerant->grt_nom)[1],0, 1)}}?</label>
		<textarea></textarea>
	</div>
</div>
<div class="major">
	<input type="hidden" name="type_action" value="mail">
	<input type="submit" name="submit" value="Contacter pour règler">
	@endif
</div>
</form>
<div class="aside major">
	<label>Devis</label>
	<hr>
	<p>Tarif pour {{$info->nb_nuit}}<span style="float: right;">{{$montant}}</span></p>
	<p>Taxe <span  style="float: right;">0€</span></p>
	<p>Frais du propriétaire <span style="float: right;">0€</span></p>	
	<p><strong><span>Sous-total</span><span style="float: right;">{{$montant}}</span></strong></p>
	<p><strong>Info clés</strong></p>
	<hr>
	<p>Cambres: {{$location->loc_nbchambres}}/ salles de bain: {{$location->loc_nbsallebain}}/ couchages: {{$location->loc_nbcouchages}}</p>
	<p>{{$location->loc_ville , $location->loc_cp , $location->pay_nom}}</p>
	<p><strong>{{$date->arrive - $date->depart}}</strong></p>
	<p>{{$info->nb_nuit / $info->nb_pers}}</p>
</div>
@endsection