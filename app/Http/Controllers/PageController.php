<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home()
    {
        return view("frontend.welcome", [
            "title" => "Beranda",
            "events" => Event::all(),
        ]);
    }

    public function event($slug)
    {
        $event = Event::firstWhere("slug", $slug);
        return view("frontend.event.event", [
            "title" => "Event",
            "event" => $event
        ]);
    }

    public function eventTickets($slug)
    {
        $event = Event::firstWhere("slug", $slug);
        return view("frontend.event.event-tickets", [
            "title" => "Pilih Tiket",
            "event" => $event
        ]);
    }

    public function eventDataDiri(Request $request, $slug)
    {
        $data_ticket = [];
        foreach ($request->count as $ticketID => $quantity) {
            if ($quantity > 0) {
                for ($i = 1; $i <= $quantity; $i++) {
                    array_push($data_ticket, [
                        "id" => $ticketID,
                        "name" => Ticket::firstWhere("id", $ticketID)->name,
                        "price" => Ticket::firstWhere("id", $ticketID)->price,
                    ]);
                }
            }
        }

        $sub_total = array_sum(Arr::pluck($data_ticket, "price"));
        $tax = Event::firstWhere("slug", $slug)->tax;
        $taxAmount = $sub_total * $tax / 100;
        $total = $sub_total + $taxAmount;

        if (!Auth::check()) {
            session()->put("redirect", [
                "route" => route("event.tickets", $slug),
            ]);
            return redirect()->route("login");
        }

        if (session("redirect")) {
            session()->forget("redirect");
        }

        return view("frontend.event.event-data-diri", [
            "title" => "Data Diri",
            "event" => Event::firstWhere("slug", $slug),
            "data_ticket" => [
                "tickets" => $data_ticket,
                "sub_total" => $sub_total,
                "tax" => $tax,
                "tax_amount" => $taxAmount,
                "total" => $total,
            ],
        ]);
    }

    public function eventPembayaran(Request $request, $slug)
    {
        $data_pengunjung = [];
        for ($i = 1; $i <= $request->jumlah_pembeli_ticket; $i++) {
            array_push($data_pengunjung, [
                "ticket_id" => $request->input("ticket_id")[$i],
                "name" => $request->input("name-pengunjung")[$i],
                "email" => $request->input("email-pengunjung")[$i],
                "tanggal_lahir" => $request->input("year-pengunjung")[$i] . "-" . $request->input("month-pengunjung")[$i] . "-" . $request->input("date-pengunjung")[$i],
                "jenis_kelamin" => $request->input("jenis-kelamin-pengunjung")[$i] ?? null,
                "tipe_identitas" => $request->input("tipe-identitas-pengunjung")[$i],
                "nomor_identitas" => $request->input("nomor-identitas-pengunjung")[$i],
            ]);
        }
        $data_ticket = [
            "pembeli" => [
                "name" => $request->input("name-pembeli"),
                "email" => $request->input("email-pembeli"),
                "tanggal_lahir" => $request->input("year-pembeli") . "-" . $request->input("month-pembeli") . "-" . $request->input("date-pembeli"),
                "jenis_kelamin" => $request->input("gender-pembeli"),
                "tipe_identitas" => $request->input("tipe-identitas-pembeli"),
                "nomor_identitas" => $request->input("nomor-identitas-pembeli"),
            ],
            "pengunjung" => $data_pengunjung,
            "sub_total" => $request->input("sub_total"),
            "tax" => $request->input("tax"),
            "tax_amount" => $request->input("tax_amount"),
            "total" => $request->input("total"),
        ];


        return view("frontend.event.event-pembayaran", [
            "title" => "Data Diri",
            "event" => Event::firstWhere("slug", $slug),
            "data_ticket" => $data_ticket
        ]);
    }

    public function eventPaymentWaiting($slug, $invoice)
    {
        return view("frontend.event.event-payment-waiting", [
            "title" => "Menunggu Pembayaran",
            "transaction" => Transaction::firstWhere("invoice", $invoice),
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
            "transactions" => Transaction::where("user_id", Auth::user()->id)->get()
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

    public function changePassword()
    {
        return view("backend.profile.change-password", [
            "title" => "Ubah Password",
        ]);
    }
}
