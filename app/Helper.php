<?php

use App\Models\Menu;
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
        return Menu::where("type", "title")->get();
    }
}

if (!function_exists("getMenuLink")) {
    function getMenuLink($slug)
    {
        return Menu::where("type", "link")->where("slug_id", $slug)->get();
    }
}
