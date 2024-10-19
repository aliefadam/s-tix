<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            [
                "type" => "title",
                "name" => "Menu",
                "slug" => "menu",
            ],
            [
                "type" => "link",
                "name" => "dashboard",
                "url" => "admin.dashboard",
                "icon" => "fa-regular fa-house",
                "slug_id" => "menu",
            ],
            [
                "type" => "title",
                "name" => "Event",
                "slug" => "event",
            ],
            [
                "type" => "link",
                "name" => "vendor",
                "url" => "admin.vendor.index",
                "icon" => "fa-regular fa-users",
                "slug_id" => "event",
            ],
            [
                "type" => "title",
                "name" => "Umum",
                "slug" => "umum",
            ],
            [
                "type" => "link",
                "name" => "Pengaturan",
                "url" => "admin.vendor.index",
                "icon" => "fa-regular fa-gear",
                "slug_id" => "umum",
            ],
            [
                "type" => "link",
                "name" => "Website",
                "url" => "admin.vendor.index",
                "icon" => "fa-regular fa-globe",
                "slug_id" => "umum",
            ],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
