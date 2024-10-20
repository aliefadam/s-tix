<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view("auth.login", [
            "title" => "Login",
        ]);
    }

    public function loginPost(Request $request)
    {
        $validate = $request->validate([
            "email" => "required|email",
            "password" => "required",
        ], [
            "email.required" => "Email harus diisi",
            "email.email" => "Email tidak valid",
            "password.required" => "Password harus diisi",
        ]);

        $credentials = [
            "email" => $request->email,
            "password" => $request->password
        ];

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == "super-admin") {
                return redirect()->route("admin.dashboard");
            } else if (Auth::user()->role == "user") {
                return redirect()->route("home");
            }
        } else {
            return redirect()->back()->with("notification", [
                "title" => "Gagal",
                "text" => "Email atau password salah",
                "icon" => "error",
            ]);
        }
    }

    public function register()
    {
        return view("auth.register", [
            "title" => "Register",
        ]);
    }

    public function registerPost(Request $request)
    {
        $validate = $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:3|confirmed",
        ], [
            "name.required" => "Nama harus diisi",
            "email.required" => "Email harus diisi",
            "email.email" => "Email tidak valid",
            "email.unique" => "Email sudah terdaftar",
            "password.required" => "Password harus diisi",
            "password.min" => "Password minimal 8 karakter",
            "password.confirmed" => "Konfirmasi password tidak sesuai",
        ]);

        $newUser = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "role" => "user",
        ];

        User::create($newUser);
        return redirect()->route("login")->with("notification", [
            "title" => "Berhasil",
            "text" => "Pendaftaran Berhasil, silahkan login",
            "icon" => "success",
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route("home");
    }
}
