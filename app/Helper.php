<?php

use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

if (!function_exists("generateQR")) {
    function generateQR($code, $size = 200)
    {
        return QrCode::size($size)->generate($code);
    }
}

if (!function_exists("generateQRWithColor")) {
    function generateQRWithColor($code, $size = 200, $color = [0, 0, 0])
    {
        return QrCode::size($size)->color($color[0], $color[1], $color[2])->generate($code);
    }
}

if (!function_exists("generateQRWithLogo")) {
    function generateQRWithLogo($code, $size = 200, $logo = 'path/to/logo.png')
    {
        return QrCode::size($size)
            ->merge($logo, 0.3)
            ->generate($code);
    }
}

if (!function_exists("generateQRAsImage")) {
    function generateQRAsImage($code, $size = 200)
    {
        return QrCode::format('png')
            ->size($size)
            ->generate($code);
    }
}

if (!function_exists("getMenuTitle")) {
    function getMenuTitle()
    {
        $role = Auth::user()->role;
        $menuTitles = collect(Menu::where("type", "title")->get())->filter(function ($menu) use ($role) {
            $roles = json_decode($menu->role);
            if (in_array($role, $roles)) {
                return $menu;
            }
        });
        return $menuTitles;
    }
}

if (!function_exists("getMenuLink")) {
    function getMenuLink($slug)
    {
        $role = Auth::user()->role;
        $menuLinks = collect(Menu::where("type", "link")->where("slug_id", $slug)->get())->filter(function ($menu) use ($role) {
            $roles = json_decode($menu->role);
            if (in_array($role, $roles)) {
                return $menu;
            }
        });
        return $menuLinks;
    }
}

if (!function_exists("static_asset")) {
    function static_asset($path)
    {
        return asset("imgs/{$path}");
    }
}

if (!function_exists("upload_asset")) {
    function upload_asset($path)
    {
        return asset("storage/{$path}");
    }
}

if (!function_exists("money_format")) {
    function money_format($number)
    {
        return "Rp. " . number_format($number, 0, ',', '.');
    }
}
