<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AllergeneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('allergens')->insert([
            ['code'=>'a','name'=>'Getreideprodukte','typ'=>'Getreide (Gluten)'],
            ['code'=>'a1','name'=>'Weizen','typ'=>'Allergen'],
            ['code'=>'a2','name'=>'Roggen','typ'=>'Allergen'],
            ['code'=>'a3','name'=>'Gerste','typ'=>'Allergen'],
            ['code'=>'a4','name'=>'Dinkel','typ'=>'Allergen'],
            ['code'=>'a5','name'=>'Hafer','typ'=>'Allergen'],
            ['code'=>'a6','name'=>'Dinkel','typ'=>'Allergen'],
            ['code'=>'b','name'=>'Fisch','typ'=>'Allergen'],
            ['code'=>'c','name'=>'Krebstiere','typ'=>'Allergen'],
            ['code'=>'d','name'=>'Schwefeldioxid/Sulfit','typ'=>'Allergen'],
            ['code'=>'e','name'=>'Sellerie','typ'=>'Allergen'],
            ['code'=>'f','name'=>'Milch und Laktose','typ'=>'Allergen'],
            ['code'=>'f1','name'=>'Butter','typ'=>'Allergen'],
            ['code'=>'f2','name'=>'Käse','typ'=>'Allergen'],
            ['code'=>'f3','name'=>'Margarine','typ'=>'Allergen'],
            ['code'=>'g','name'=>'Sesam','typ'=>'Allergen'],
            ['code'=>'h','name'=>'Nüsse','typ'=>'Allergen'],
            ['code'=>'h1','name'=>'Mandeln','typ'=>'Allergen'],
            ['code'=>'h2','name'=>'Haselnüsse','typ'=>'Allergen'],
            ['code'=>'h3','name'=>'Walnüsse','typ'=>'Allergen'],
            ['code'=>'i','name'=>'Erdnüsse','typ'=>'Allergen'],
        ]);
    }
}
