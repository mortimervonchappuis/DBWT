<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Gericht_hat_allergen_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gericht_hat_allergens')->insert([
            ['code'=>'h','gericht_id'=>1,],
            ['code'=>'a3','gericht_id'=>1,],
            ['code'=>'a4','gericht_id'=>1,],
            ['code'=>'f1','gericht_id'=>3,],
            ['code'=>'a6','gericht_id'=>3,],
            ['code'=>'i','gericht_id'=>3,],
            ['code'=>'a3','gericht_id'=>4,],
            ['code'=>'a4','gericht_id'=>4,],
            ['code'=>'f1','gericht_id'=>4,],
            ['code'=>'h3','gericht_id'=>4,],
            ['code'=>'d','gericht_id'=>6,],
            ['code'=>'h1','gericht_id'=>7,],
            ['code'=>'a2','gericht_id'=>7,],
            ['code'=>'h3','gericht_id'=>7,],
            ['code'=>'c','gericht_id'=>7,],
            ['code'=>'a3','gericht_id'=>8,],
            ['code'=>'h3','gericht_id'=>10,],
            ['code'=>'d','gericht_id'=>10,],
            ['code'=>'f','gericht_id'=>10,],
            ['code'=>'f2','gericht_id'=>12,],
            ['code'=>'h1','gericht_id'=>12,],
            ['code'=>'a5','gericht_id'=>12,],
            ['code'=>'c','gericht_id'=>1,],
            ['code'=>'a2','gericht_id'=>9,],
            ['code'=>'i','gericht_id'=>14,],
            ['code'=>'f1','gericht_id'=>1,],
            ['code'=>'a1','gericht_id'=>15,],
            ['code'=>'a4','gericht_id'=>15,],
            ['code'=>'i','gericht_id'=>15,],
            ['code'=>'f3','gericht_id'=>15,],
            ['code'=>'h3','gericht_id'=>15,],
        ]);
    }
}
