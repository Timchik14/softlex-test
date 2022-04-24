<?php

namespace App\Http\Controllers;

use App\Models\City;

class CitiesController extends Controller
{
    public function show(City $city)
    {
        $cityWithVisits = City::with('visits')->find($city['id']);
        $count = $cityWithVisits['visits']->count();
        return view('cities.index', compact(['cityWithVisits', 'count']));
    }
}
