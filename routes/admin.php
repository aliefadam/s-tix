<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\VendorController;
use App\Http\Middleware\AdminRoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware(AdminRoleMiddleware::class)->group(function () {
    Route::prefix("admin")->group(function () {
        Route::get("/", [PageController::class, "directDashboard"])->name("admin.directDashboard");
        Route::get("/dashboard", [PageController::class, "dashboard"])->name("admin.dashboard");

        Route::get("/change-password", [PageController::class, "changePassword"])->name("admin.changePassword");
        Route::post("/change-password", [AuthController::class, "changePasswordPost"])->name("admin.changePasswordPost");

        Route::resource("vendor", VendorController::class)->names([
            "index" => "admin.vendor.index",
            "create" => "admin.vendor.create",
            "store" => "admin.vendor.store",
            "edit" => "admin.vendor.edit",
            "update" => "admin.vendor.update",
            "destroy" => "admin.vendor.delete",
        ]);

        Route::resource("event", EventController::class)->names([
            "index" => "admin.event.index",
            "create" => "admin.event.create",
            "store" => "admin.event.store",
            "show" => "admin.event.show",
            "update" => "admin.event.update",
            "destroy" => "admin.event.delete",
        ]);
    });
});
