<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get("/", [PageController::class, "home"])->name("home");

Route::get("/event/{id}", [PageController::class, "event"])->name("event");
Route::get("/event/{id}/tickets", [PageController::class, "eventTickets"])->name("event.tickets");
Route::get("/event/{id}/data-diri", [PageController::class, "eventDataDiri"])->name("event.data-diri");
Route::get("/event/{id}/pembayaran", [PageController::class, "eventPembayaran"])->name("event.pembayaran");
Route::get("/event/{id}/payment", [PageController::class, "eventPayment"])->name("event.payment");
Route::get("/event/{id}/payment-waiting/{invoice}", [PageController::class, "eventPaymentWaiting"])->name("event.payment-waiting");

Route::get("/profile", [PageController::class, "profile"])->name("profile");

Route::get("/transaction", [PageController::class, "transaction"])->name("transaction");
