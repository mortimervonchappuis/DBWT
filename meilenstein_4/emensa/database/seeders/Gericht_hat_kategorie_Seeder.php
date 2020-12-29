<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Gericht_hat_kategorie_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gericht_hat_kategories')->insert([
            ['kategorie_id'=>3,'gericht_id'=>1,],
            ['kategorie_id'=>3,'gericht_id'=>3,],
            ['kategorie_id'=>3,'gericht_id'=>4,],
            ['kategorie_id'=>3,'gericht_id'=>5,],
            ['kategorie_id'=>3,'gericht_id'=>6,],
            ['kategorie_id'=>3,'gericht_id'=>7,],
            ['kategorie_id'=>3,'gericht_id'=>9,],
            ['kategorie_id'=>4,'gericht_id'=>16,],
            ['kategorie_id'=>4,'gericht_id'=>17,],
            ['kategorie_id'=>4,'gericht_id'=>18,],
            ['kategorie_id'=>5,'gericht_id'=>16,],
            ['kategorie_id'=>5,'gericht_id'=>17,],
            ['kategorie_id'=>5,'gericht_id'=>18,],
        ]);
    }
}
