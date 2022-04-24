<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Visit;

class StatisticsController extends Controller
{
    public function index()
    {
        //получаем все посещения, переопределяем параметр $pageName для пагинатора
        $visits = Visit::withCount('city')
            ->paginate($perPage = 20, $columns = ['*'], $pageName = 'visits');

        //получаем общее количество посещений
        $visitsCount = Visit::count();

        //получаем города с количеством посещений
        $citiesWithVisitsCount = City::withCount('visits')->paginate(10);

        return view('statistics.index', compact(['visitsCount', 'citiesWithVisitsCount', 'visits']));
    }
}
