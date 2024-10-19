<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

Route::prefix("admin")->group(function () {
    Route::get("/", function () {
        return redirect()->route("admin.dashboard");
    });
    Route::get("/dashboard", [PageController::class, "dashboard"])->name("admin.dashboard");

    Route::prefix("/vendor")->group(function () {
        Route::get("/", [VendorController::class, "index"])->name("admin.vendor.index");
    });
});
