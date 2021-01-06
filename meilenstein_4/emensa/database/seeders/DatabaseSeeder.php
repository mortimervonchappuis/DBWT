<?php

namespace Database\Seeders;

use App\Models\Benutzer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call([
           GerichteSeeder::class,
           AllergeneSeeder::class,
           KategorienSeeder::class,
           Gericht_hat_allergen_Seeder::class,
           Gericht_hat_kategorie_Seeder::class,
           BenutzerSeeder::class,
           BewertungsSeeder::class,
       ]);
    }
}
