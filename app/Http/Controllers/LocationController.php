<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Calendar;
use App\PlanningLocation;

class LocationController extends Controller
{

    public function home()
    {
        return view ('welcome',  ["location" => Location::All()]);
    }

    public function searchResult(Request $request)
    {
    	$location = [];
    	foreach (Location::All() as $key => $value) 
    		{

    			if (levenshtein($value->loc_ville, $request->input('ville')) < 10 )
    			{
    				$location[] = $value;
    			}
    		}
    	return view ('location-search-result',  ["location" => $location]);
    }

    public function detail(int $id)
    {
    	$location = Location::Find($id);
    	$disponibilite = PlanningLocation::All();
    	$dispo = [];
    	foreach ($disponibilite as $key => $planning) {
    		if($planning->loc_id == $id){
	    		if ($planning->plo_disponibilite) {
	    			$dispo['ouvert'][] = $planning->plo_datelocation;	
	    		}
	    		else{
	    			$dispo['fermer'][] = $planning->plo_datelocation;	
	    		}
    		}
    		
    	}
        return view ( 'detail', ["location" =>$location, "calendrier" => Calendar::calendrier(6,$dispo), "diponibilites" => $dispo]);
    }
}
