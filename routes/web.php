<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get("/", [PageController::class, "home"])->name("home");

Route::prefix("event")->group(function () {
    Route::get("/{id}", [PageController::class, "event"])->name("event");
    Route::get("/{id}/tickets", [PageController::class, "eventTickets"])->name("event.tickets");
    Route::get("/{id}/data-diri", [PageController::class, "eventDataDiri"])->name("event.data-diri");
    Route::get("/{id}/pembayaran", [PageController::class, "eventPembayaran"])->name("event.pembayaran");
    Route::get("/{id}/payment", [PageController::class, "eventPayment"])->name("event.payment");
    Route::get("/{id}/payment-waiting/{invoice}", [PageController::class, "eventPaymentWaiting"])->name("event.payment-waiting");
});

Route::prefix("/profile")->group(function () {
    Route::get("/", [PageController::class, "profile"])->name("profile");
});

Route::prefix("/transaction")->group(function () {
    Route::get("/", [PageController::class, "transaction"])->name("transaction");
});

Route::prefix("/ticket")->group(function () {
    Route::get("/", [PageController::class, "ticket"])->name("ticket");
    Route::get("/{id}", [PageController::class, "ticketDetail"])->name("ticket.detail");
});
