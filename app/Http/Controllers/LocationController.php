<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;

class LocationController extends Controller
{
    public function search()
    {
    	return view ('location-search', []);
    }

    public function searchResult(Request $request)
    {
    	$AllLocation = Location::All();
    	$location = [];
    	foreach ($AllLocation as $key => $value) 
    		{

    			if (levenshtein($value->loc_ville, $request->input('ville')) < 10 )
    			{
    				$location[] = $value;
    			}
    		}
    	return view ('location-search-result',  ["location" => $location]);
    }
}
