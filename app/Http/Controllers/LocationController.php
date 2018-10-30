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
        $location = [];
        foreach (Location::All() as $value) {
            $location[] = [$value,$this->dispo($value->loc_id),"tarifMin" => $value->toTarifMin()];
        }
        return view ('welcome',  ["location" => $location]);
    }

    public function searchResult(Request $request)
    {
    	$location = [];
    	foreach (Location::All() as $key => $value) 
    		{
    			if (levenshtein($value->loc_ville, $request->input('ville')) < 10 )
    			{
    				$location[] = [ $value,$this->dispo($value->loc_id)];
    			}
    		}
    	return view ('location-search-result',  ["location" => $location]);
    }
    private function dispo(int $id)
    {
        $disponibilite = PlanningLocation::All();
        $dispo = ['ouvert'=>[null], 'fermer'=>[null]];
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
        return $dispo;
    }
    public function detail(int $id)
    {
    	$location = Location::Find($id);
    	$dispo = $this->dispo($id);
        return view ( 'detail', ["location" =>$location, "calendrier" => Calendar::calendrier(6,$id ,$dispo), "diponibilites" => $dispo, "tarifMin" => $location->toTarifMin()]);
    }
}
