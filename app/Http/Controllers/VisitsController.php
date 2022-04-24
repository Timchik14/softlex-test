<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatisticsRequest;
use App\Models\Visit;
use Illuminate\Http\Request;

class VisitsController extends Controller
{
    public function index(Request $request, StatisticsRequest $statisticsRequest)
    {
        //валидируем поля
        $validated = $statisticsRequest->validated();

        //получаем из валидированных
        $before = $validated['before'];
        $after = $validated['after'];

        //достаем посещения с городами, применяя фильтр по дате
        $visits = Visit::with('city')
            ->whereDate('created_at', '<', $before)
            ->whereDate('created_at', '>', $after)
            ->paginate(15)
            ->withQueryString();

        //считаем количество посещений
        $visitsCount = Visit::with('city')
            ->whereDate('created_at', '<', $before)
            ->whereDate('created_at', '>', $after)
            ->count();

        //подключаем отображение, передав полученные значения
        return view('statistics.show', compact(['visitsCount', 'visits']));
    }

    public function show(Visit $visit)
    {
        return view('visitors.index', compact(['visit']));
    }
}
