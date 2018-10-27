<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;

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
        return view ( 'detail', ["location" =>Location::Find($id)]);
    }
}
