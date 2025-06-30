<?php

use App\Http\Controllers\CompetitionWork;
use Illuminate\Support\Facades\Route;

Route::get('works', [CompetitionWork::class, 'allWorks']);
