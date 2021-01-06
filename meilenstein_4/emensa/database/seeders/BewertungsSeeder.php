<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BewertungsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bewertungs')->insert([
            [
            'beschreibung'=>'War sehr lecker würde das Gericht jedem empfehlen',
            'sterne'=>1,
            'gericht_id'=>1,
            'benutzer_id' => 1
            ],
            [
            'beschreibung'=>'War ungenießbar würde das Gericht jedem empfehlen',
            'sterne'=>1,
            'gericht_id'=>1,
            'benutzer_id' => 1
            ],
        ]);
    }
}
