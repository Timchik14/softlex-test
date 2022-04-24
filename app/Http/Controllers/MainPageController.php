<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Visit;
use App\Services\Finder;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index(Finder $finder, Request $request)
    {
        $cityName = $finder->findCity($request);
        $browserName = $finder->findBrowser($request);

        $city = City::firstOrCreate(['name' => $cityName]);
//        dd($city);

        Visit::create([
            'ip' => $request->ip(),
            'browser' => $browserName,
            'city_id' => $city->id
        ]);

        return view('index');
    }
}
