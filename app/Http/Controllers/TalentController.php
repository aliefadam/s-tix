<?php

namespace App\Http\Controllers;

use App\Models\Talent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TalentController extends Controller
{
    public function index() {}

    public function create() {}

    public function store(Request $request, $event_id)
    {
        $validate = $request->validate([
            "name" => "required",
            "image" => "required",
        ], [
            "name.required" => "Nama Talent harus diisi",
            "image.required" => "Gambar Talent harus diisi",
        ]);

        $image = $request->file("image");
        $imageName = "talents/talent-" . str()->slug($validate["name"]) . "." . $image->extension();
        $image->storeAs("public/", $imageName);

        $validate["image"] = $imageName;
        $validate["event_id"] = $event_id;
        try {
            DB::beginTransaction();
            Talent::create($validate);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with("error", [
                "title" => "Gagal",
                "text" => $e->getMessage(),
                "icon" => "error",
            ]);
        }

        return redirect()->back()->with("notification", [
            "title" => "Sukses",
            "text" => "Talent berhasil ditambahkan",
            "icon" => "success",
        ]);
    }

    public function show($id)
    {
        return response()->json([
            "talent" => Talent::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            "name" => "required",
        ], [
            "name.required" => "Nama Talent harus diisi",
        ]);

        if ($request->hasFile("image")) {
            $image = $request->file("image");
            $imageName = "talents/talent-" . str()->slug($validate["name"]) . "." . $image->extension();
            $oldImage = Talent::find($id)->image;
            if ($oldImage) {
                Storage::delete("public/" . $oldImage);
            }

            $image->storeAs("public/", $imageName);
            $validate["image"] = $imageName;
        }

        try {
            DB::beginTransaction();
            Talent::find($id)->update($validate);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with("error", [
                "title" => "Gagal",
                "text" => $e->getMessage(),
                "icon" => "error",
            ]);
        }
        return redirect()->back()->with("notification", [
            "title" => "Sukses",
            "text" => "Talent berhasil ditambahkan",
            "icon" => "success",
        ]);
    }

    public function destroy($id)
    {
        Talent::find($id)->delete();
        session()->flash("notification", [
            "title" => "Sukses",
            "text" => "Talent berhasil dihapus",
            "icon" => "success",
        ]);
    }
}
