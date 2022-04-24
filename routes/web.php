<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\VisitsController;
use App\Http\Controllers\CitiesController;

//по этому маршруту считаем посещения
Route::get('/', [MainPageController::class, 'index']);

// по этому маршруту страница с фильтрами
Route::get('/index', [StatisticsController::class, 'index'])->name('index');

//здесь отфильтрованная информация
Route::get('/visits', [VisitsController::class, 'index'])->name('visits');

//статистика для отдельного посетителя
Route::get('/visits/{visit}', [VisitsController::class, 'show'])->name('visit.show');

//посещения по городам
Route::get('/cities/{city}', [CitiesController::class, 'show'])->name('city.show');
