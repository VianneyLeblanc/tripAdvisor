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
	<h1>2 &nsbp;
	@if($location->loc_codeReservationTrip == 0)
	Vérifier et réserver</h1>
	<?php $name_paimenent = $location->togerant->topaiment->typ_libelle; ?>
	<p>Pour réserver cette location, vous devez payer avec {{$name_paimenent}}.</p>
	<p>En cliquant sur Continuer par {{$name_paimenent}} ci-dessous, vous serez redirigé vers le site {{$name_paimenent}} pour terminer votre paiement.@if($name_paimenent == 'Paypal') Même si vous n'avez pas de compte PayPal, vous pouvez payer en tant qu'invité avec une carte bancaire. @endif</p>
	<p>La somme de {{$montant}} sera facturée sur votre compte</p>
	<input type="hidden" name="type_action" value="{{$name_paimenent}}">
	<input type="submit" name="submit" value="Continuer par {{$name_paimenent}}">
	<p>Cette réservation est encadrée par Holiday Lettings Ltd (une société du groupe TripAdvisor), mais le contrat de réservation est conclu uniquement entre vous et le propriétaire/gérant. En cliquant ci-dessus, vous acceptez les conditions de réservation et les conditions d'annulation du propriétaire/gérant, ainsi que les conditions d'utilisation (y compris la politique relative aux oppositions) et la politique de confidentialité de Holiday Lettings. En cliquant ci-dessus, vous devenez membre TripAdvisor et acceptez notre politique de confidentialité et nos conditions d'utilisation. Bien que votre réservation soit encadrée par Holiday Lettings, votre paiement sera traité par une autre société du groupe, par exemple FlipKey Inc., pour le compte de Holiday Lettings.</p>
	@else
	Réserver directement</h1>
	<p>Pour réserver cette location, vous devez contacter directement le proprietaire.</p>
	<input type="hidden" name="type_action" value="mail">
	<input type="submit" name="submit" value="Contacter pour règler">
	@endif
</div>
</form>
<div class="aside major">
	<img src="">
	<label>{{$location->loc_titre}}</label>
	<p>Cambres: {{$location->loc_nbchambres}}/ salles de bain: {{$location->loc_nbsallebain}}/ couchages: {{$location->loc_nbcouchages}}</p>
	<p>{{$location->loc_ville , $location->loc_cp , $location->pay_nom}}</p>
	<p><strong>{{$date->arrive - $date->depart}}</strong></p>
	<p>{{$info->nb_nuit / $info->nb_pers}}</p>
	<hr>
	<p><strong><span>Total</span><span style="float: right;">{{$montant}}</span></strong></p>
</div>
@endsection