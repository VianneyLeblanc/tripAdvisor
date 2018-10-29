@extends('layouts.app')
@section('content')
<h2>Résultat de la recherche</h2>
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
	<form >
		<div id="calendarSelector1_{{$loc[0]->loc_id}}" class="hidden">
	    	<span id="previous" class="button" value="<" onclick="previousMonth('calendarSelector1_'+{{$loc[0]->loc_id}})" data-nb="0">&#160 &lt &#160</span>
	    	<span class="button" id="next" value=">" onclick="nextMonth('calendarSelector1_'+{{$loc[0]->loc_id}})" data-nb="1">&#160 &gt &#160</span>
    	<?php echo \App\Calendar::calendrier(6, $loc[0]->loc_id, $loc[1]) ?>
    </div>
		<div class="inputDate">
			<input placeholder="Arriver" type="text" name="dateArrivee{{$loc[0]->loc_id}}" onclick="showCalendarArrive('_'+{{$loc[0]->loc_id}})" value="">
			<i class="fas fa-calendar-alt internal" onclick="showCalendarArrive('_'+{{$loc[0]->loc_id}})"></i>
		</div>
		<div class="inputDate">
			<input placeholder="Départ" type="text" name="dateDepart{{$loc[0]->loc_id}}" onclick="showCalendarDepart('_'+{{$loc[0]->loc_id}})" value="">
			<i class="fas fa-calendar-alt internal" onclick="showCalendarDepart('_'+{{$loc[0]->loc_id}})"></i>
		</div>
		<div id="calendarSelector2_{{$loc[0]->loc_id}}" class="hidden">
	    	<span id="previous" class="button" value="<" onclick="previousMonth('calendarSelector2_'+{{$loc[0]->loc_id}})" data-nb="0">&#160 &lt &#160</span>
	    	<span class="button" id="next" value=">" onclick="nextMonth('calendarSelector2_'+{{$loc[0]->loc_id}})" data-nb="1">&#160 &gt &#160</span>
    	<?php echo \App\Calendar::calendrier(6,$loc[0]->loc_id, $loc[1]) ?>
    </div>
		<input style="margin: 3px;    width: 100%;" type="submit" name="submit" value="Réservez">
	</form>
	</div>
</div>
</div>
@endforeach
@endsection