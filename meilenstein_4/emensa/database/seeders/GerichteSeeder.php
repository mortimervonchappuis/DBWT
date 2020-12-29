<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GerichteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gerichtes')->insert([
            [
            'name'=>'Bratkartoffeln mit Speck und Zwiebeln',
            'beschreibung'=>'Kartoffeln mit Zwiebeln und gut Speck',
            'vegetarisch'=>1,
            'vegan'=>1,
            'preis_intern'=>2.3,
            'preis_extern'=>4.0
            ],
            [
            'name'=>'Bratkartoffeln mit Zwiebeln',
            'beschreibung'=>'Kartoffeln mit Zwiebeln und ohne Speck',
            'vegetarisch'=>1,
            'vegan'=>1,
            'preis_intern'=>2.3,
            'preis_extern'=>4.0,
            ],
            [
            'name'=>'Bratkartoffeln ohne Zwiebel',
            'beschreibung'=>'Kartoffeln in Butter gedünstet',
            'vegetarisch'=>1,
            'vegan'=>0,
            'preis_intern'=>2.0,
            'preis_extern'=>3.5,
            ],
            [
            'name'=>'Grilltofu',
            'beschreibung'=>'Fein gewürzt und mariniert',
            'vegetarisch'=>1,
            'vegan'=>1,
            'preis_intern'=>2.5,
            'preis_extern'=>4.5,
            ],
            [
            'name'=>'Lasagne',
            'beschreibung'=>'Klassisch mit Bolognesesoße und Creme Fraiche',
            'vegetarisch'=>0,
            'vegan'=>0,
            'preis_intern'=>2.5,
            'preis_extern'=>4.5,
            ],
            [
            'name'=>'Lasagne vegetarisch',
            'beschreibung'=>'Klassisch mit Sojagranulatsoße und Creme Fraiche',
            'vegetarisch'=>1,
            'vegan'=>0,
            'preis_intern'=>2.5,
            'preis_extern'=>4.5,
            ],
            [
            'name'=>'Hackbraten',
            'beschreibung'=>'Nicht nur für Hacker',
            'vegan'=>0,
            'vegetarisch'=>0,
            'preis_intern'=>2.5,
            'preis_extern'=>4.0,
            ],
            [
            'name'=>'Gemüsepfanne',
            'beschreibung'=>'Gesundes aus der Region, deftig angebraten',
            'vegan'=>1,
            'vegetarisch'=>1,
            'preis_intern'=>2.3,
            'preis_extern'=>4.0,
            ],
            [
            'name'=>'Hühnersuppe',
            'beschreibung'=>'Suppenhuhn trifft Petersilie',
            'vegan'=>0,
            'vegetarisch'=>0,
            'preis_intern'=>2,
            'preis_extern'=>3.5,
            ],
            [
            'name'=>'Forellenfilet',
            'beschreibung'=>'mit Kartoffeln und Dilldip',
            'vegan'=>0,
            'vegetarisch'=>0,
            'preis_intern'=>3.8,
            'preis_extern'=>5,
            ],
            [
            'name'=>'Kartoffel-Lauch-Suppe',
            'beschreibung'=>'der klassische Bauchwärmer mit frischen Kräutern',
            'vegan'=>0,
            'vegetarisch'=>1,
            'preis_intern'=>2,
            'preis_extern'=>3,
            ],
            [
            'name'=>'Kassler mit Rosmarinkartoffeln',
            'beschreibung'=>'dazu Salat und Senf',
            'vegan'=>0,
            'vegetarisch'=>0,
            'preis_intern'=>3.8,
            'preis_extern'=>5.2,
            ],
            [
            'name'=>'Drei Reibekuchen mit Apfelmus',
            'beschreibung'=>'grob geriebene Kartoffeln aus der Region',
            'vegan'=>0,
            'vegetarisch'=>1,
            'preis_intern'=>2.5,
            'preis_extern'=>4.5,
            ],
            [
            'name'=>'Pilzpfanne',
            'beschreibung'=>'die legendäre Pfanne aus Pilzen der Saison',
            'vegan'=>0,
            'vegetarisch'=>1,
            'preis_intern'=>3,
            'preis_extern'=>5,
            ],
            [
            'name'=>'Pilzpfanne vegan',
            'beschreibung'=>'die legendäre Pfanne aus Pilzen der Saison ohne Käse',
            'vegan'=>1,
            'vegetarisch'=>1,
            'preis_intern'=>3,
            'preis_extern'=>5,
            ],
            [
            'name'=>'Käsebrötchen',
            'beschreibung'=>'schmeckt vor und nach dem Essen',
            'vegan'=>0,
            'vegetarisch'=>1,
            'preis_intern'=>1,
            'preis_extern'=>1.5,
            ],
            [
            'name'=>'Schinkenbrötchen',
            'beschreibung'=>'schmeckt auch ohne Hunger',
            'vegan'=>0,
            'vegetarisch'=>0,
            'preis_intern'=>1.25,
            'preis_extern'=>1.75,
            ],
            [
            'name'=>'Tomatenbrötchen',
            'beschreibung'=>'mit Schnittlauch und Zwiebeln',
            'vegan'=>1,
            'vegetarisch'=>1,
            'preis_intern'=>1,
            'preis_extern'=>1.5,
            ],
            [
            'name'=>'Mousse au Chocolat',
            'beschreibung'=>'sahnige schweizer Schokolade rundet jedes Essen ab',
            'vegan'=>0,
            'vegetarisch'=>1,
            'preis_intern'=>1.25,
            'preis_extern'=>1.75,
            ],
            [
            'name'=>'Suppenkreation á la Chef',
            'beschreibung'=>'was verschafft werden muss, gut und günstig',
            'vegan'=>0,
            'vegetarisch'=>0,
            'preis_intern'=>0.5,
            'preis_extern'=>0.9,
            ],
        ]);
    }
}
