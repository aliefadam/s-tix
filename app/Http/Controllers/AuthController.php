<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

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
            } else if (Auth::user()->role == "vendor") {
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

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $google_user = Socialite::driver('google')->user();
        User::updateOrCreate([
            "email" => $google_user->email,
        ], [
            "name" => $google_user->name,
            "email" => $google_user->email,
            "password" => bcrypt(Str::random(10)),
            "role" => "user",
        ]);
        $user = User::firstWhere("email", $google_user->email);
        Auth::login($user);

        return redirect()->route("home");
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

    public function forgotPassword()
    {
        return view("auth.forgot-password", [
            "title" => "Lupa Password",
        ]);
    }

    public function forgotPasswordPost(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status == "passwords.user") {
            return back()->with("notification", [
                "title" => "Error",
                "text" => "Email anda tidak terdaftar disistem kami",
                "icon" => "error",
            ]);
        }

        return redirect()->route("forgot-password.done");
    }

    public function forgotPasswordDone()
    {
        return view("auth.forgot-password-done", [
            "title" => "Lupa Password",
        ]);
    }

    public function resetPassword($token)
    {
        return view("auth.reset-password", [
            "title" => "Reset Password",
            "token" => $token
        ]);
    }

    public function resetPasswordPost(Request $request)
    {
        if ($request->password != $request->password_confirmation) {
            return back()->with("message", [
                "title" => "Gagal",
                "text" => "Konfirmasi password tidak sesuai",
                "icon" => "error",
            ]);
        }

        User::firstWhere("email", $request->email)->update([
            "password" => bcrypt($request->password)
        ]);

        return redirect()->route("login")->with("notification", [
            "title" => "Sukses",
            "text" => "Reset Password Berhasil",
            "icon" => "success",
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route("home");
    }
}
