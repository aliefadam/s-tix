<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view("frontend.event", [
            "title" => "Event",
        ]);
    }
}
