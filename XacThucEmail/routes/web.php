<?php

use App\Http\Controllers\hiController;
use Illuminate\Support\Facades\Route;


Route::get("/a", [hiController::class, "Index"]);
