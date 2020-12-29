<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategorienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategories')->insert([
            ['eltern_id'=>NULL,'name'=>'Aktionen','bildname'=>'kat_aktionen.png',],
            ['eltern_id'=>NULL,'name'=>'Menus','bildname'=>'kat_menu.gif',],
            ['eltern_id'=>2,'name'=>'Hauptspeisen','bildname'=>'kat_menu_haupt.bmp',],
            ['eltern_id'=>2,'name'=>'Vorspeisen','bildname'=>'kat_menu_vor.svg',],
            ['eltern_id'=>2,'name'=>'Desserts','bildname'=>'kat_menu_dessert.pic',],
            ['eltern_id'=>1,'name'=>'Mensastars','bildname'=>'kat_stars.tif',],
            ['eltern_id'=>1,'name'=>'Erstiewoche','bildname'=>'kat_erties.jpg',],
        ]);
    }
}
