<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class VendorController extends Controller
{
    public function index()
    {
        return view("backend.vendor.index", [
            "title" => "Vendor",
            "vendors" => Vendor::all(),
        ]);
    }

    public function create()
    {
        return view("backend.vendor.create", [
            "title" => "Tambah Vendor",
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "category" => "required",
        ], [
            "name.required" => "Nama harus diisi",
            "email.required" => "Email harus diisi",
            "email.email" => "Email tidak valid",
            "email.unique" => "Email sudah terdaftar",
            "category.required" => "Pilih kategori vendor",
        ]);

        DB::beginTransaction();
        try {
            $password = Str::random(10);
            $newVendor = User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => bcrypt($password),
                "role" => "vendor",
            ]);
            Vendor::create([
                "user_id" => $newVendor->id,
                "category" => $request->category,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with("notification", [
                "title" => "Error",
                "text" => $e->getMessage(),
                "icon" => "error",
            ]);
        }
        DB::commit();
        return redirect()->back()->with("credential", [
            "email" => $request->email,
            "password" => $password,
        ]);
    }

    public function edit($id)
    {
        return view("backend.vendor.edit", [
            "title" => "Tambah Vendor",
            "vendor" => Vendor::firstWhere("user_id", $id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email,$id",
            "category" => "required",
        ], [
            "name.required" => "Nama harus diisi",
            "email.required" => "Email harus diisi",
            "email.email" => "Email tidak valid",
            "email.unique" => "Email sudah terdaftar",
            "category.required" => "Pilih kategori vendor",
        ]);

        DB::beginTransaction();
        try {
            $newVendor = User::find($id)->update([
                "name" => $request->name,
            ]);
            Vendor::firstWhere("user_id", $id)->update([
                "category" => $request->category,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with("notification", [
                "title" => "Error",
                "text" => $e->getMessage(),
                "icon" => "error",
            ]);
        }
        DB::commit();
        return redirect()->route("admin.vendor.index")->with("notification", [
            "title" => "Berhasil",
            "text" => "Vendor diupdate",
            "icon" => "success",
        ]);
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        Vendor::firstWhere("user_id", $id)->delete();

        return redirect()->back()->with("notification", [
            "title" => "Berhasil",
            "text" => "Vendor dihapus",
            "icon" => "success",
        ]);
    }
}
