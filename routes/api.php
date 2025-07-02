<?php

use App\Http\Controllers\CompetitionWork;
use Illuminate\Support\Facades\Route;

Route::get('works', [CompetitionWork::class, 'allWorks']);
Route::get('works/{work}', [CompetitionWork::class, 'getWork']);
Route::get('paintings', [CompetitionWork::class, 'getAllPaintings']);
Route::get('researches', [CompetitionWork::class, 'getAllResearches']);
Route::get('essays', [CompetitionWork::class, 'getAllEssays']);
