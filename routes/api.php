<?php

use App\Http\Controllers\CompetitionWorkController;
use App\Http\Controllers\EssayController;
use App\Http\Controllers\PaintingController;
use App\Http\Controllers\ResearchController;
use Illuminate\Support\Facades\Route;

Route::get('works', [CompetitionWorkController::class, 'allWorks']);
Route::get('works/{work}', [CompetitionWorkController::class, 'getWork']);
Route::get('paintings', [PaintingController::class, 'getAllPaintings']);
Route::get('researches', [ResearchController::class, 'getAllResearches']);
Route::get('essays', [EssayController::class, 'getAllEssays']);

Route::get('/districts',[CompetitionWorkController::class, 'getDistricts']);
Route::get('/districts/{district_id}/works',[CompetitionWorkController::class, 'getWorksByDistrict']);
Route::get('/districts/{district_id}/paintings',[PaintingController::class, 'getPaintingsByDistrict']);
Route::get('/districts/{district_id}/researches',[ResearchController::class, 'getResearchesByDistrict']);
Route::get('/districts/{district_id}/essays',[EssayController::class, 'getEssaysByDistrict']);
