<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function store(Request $request, $eventID)
    {
        $validate = $request->validate([
            "name" => "required",
            "price" => "required|numeric",
            "target" => "required|numeric|min:1",
        ], [
            "name.required" => "Nama Tiket harus diisi",
            "price.required" => "Harga Tiket harus diisi",
            "price.numeric" => "Harga Tiket harus berupa angka",
            "target.required" => "Target Tiket harus diisi",
            "target.numeric" => "Target Tiket harus berupa angka",
            "target.min" => "Target Tiket harus lebih besar dari 0",
        ]);
        DB::beginTransaction();
        try {
            $validate["sold"] = 0;
            $validate["event_id"] = $eventID;
            Ticket::create($validate);
            DB::commit();

            return redirect()->back()->with("notification", [
                "title" => "Sukses",
                "text" => "Tiket berhasil ditambahkan",
                "icon" => "success",
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with("notification", [
                "title" => "Error",
                "text" => $e->getMessage(),
                "icon" => "error",
            ]);
        }
    }

    public function show($id)
    {
        return response()->json([
            "ticket" => Ticket::find($id),
        ]);
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            "name" => "required",
            "price" => "required|numeric",
            "target" => "required|numeric|min:1",
        ], [
            "name.required" => "Nama Tiket harus diisi",
            "price.required" => "Harga Tiket harus diisi",
            "price.numeric" => "Harga Tiket harus berupa angka",
            "target.required" => "Target Tiket harus diisi",
            "target.numeric" => "Target Tiket harus berupa angka",
            "target.min" => "Target Tiket harus lebih besar dari 0",
        ]);
        DB::beginTransaction();
        try {
            Ticket::find($id)->update($validate);
            DB::commit();

            return redirect()->back()->with("notification", [
                "title" => "Sukses",
                "text" => "Tiket berhasil diubah",
                "icon" => "success",
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with("notification", [
                "title" => "Error",
                "text" => $e->getMessage(),
                "icon" => "error",
            ]);
        }
    }

    public function destroy($id)
    {
        Ticket::find($id)->delete();
        session()->flash("notification", [
            "title" => "Sukses",
            "text" => "Tiket berhasil dihapus",
            "icon" => "success",
        ]);
    }
}
