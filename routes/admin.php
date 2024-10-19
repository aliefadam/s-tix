<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::prefix("admin")->group(function () {
    Route::get("/", [PageController::class, "dashboard"])->name("dashboard");
});
