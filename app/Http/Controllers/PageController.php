<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home()
    {
        return view("frontend.welcome", [
            "title" => "Beranda",
        ]);
    }

    public function event($id)
    {
        return view("frontend.event.event", [
            "title" => "Event",
        ]);
    }

    public function eventTickets($id)
    {
        return view("frontend.event.event-tickets", [
            "title" => "Pilih Tiket",
        ]);
    }

    public function eventDataDiri($id)
    {
        return view("frontend.event.event-data-diri", [
            "title" => "Data Diri",
        ]);
    }

    public function eventPembayaran($id)
    {
        return view("frontend.event.event-pembayaran", [
            "title" => "Data Diri",
        ]);
    }

    public function eventPayment($id)
    {
        $invoice = "INV-TESTING";
        return redirect()->route("event.payment-waiting", [$id, $invoice]);
    }

    public function eventPaymentWaiting($id, $invoice)
    {
        return view("frontend.event.event-payment-waiting", [
            "title" => "Menunggu Pembayaran",
        ]);
    }

    public function profile()
    {
        return view("frontend.user.profile", [
            "title" => "Profil"
        ]);
    }

    public function transaction()
    {
        return view("frontend.transaction.transaction", [
            "title" => "Transaksi",
        ]);
    }

    public function ticket()
    {
        return view("frontend.ticket.ticket", [
            "title" => "Tiket",
        ]);
    }

    public function ticketDetail($id)
    {
        return view("frontend.ticket.ticket-detail", [
            "title" => "Tiket Detail",
        ]);
    }

    public function directDashboard()
    {
        return redirect()->route("admin.dashboard");
    }

    public function dashboard()
    {
        return view("backend.dashboard", [
            "title" => "Dashboard",
        ]);
    }
}
