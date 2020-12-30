<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BenutzerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Benutzers')->insert([
            ['E_Mail'=>'admin@emensa.example','password'=>'80b9c96865479e95e6a06e214efdd6242b484ed79f4ce0c11618fe5153916821ba0ac5a097c18088a89f4611d7aaa0808ff624f36800dd4e1c8473ba9bc2ae3f','admin'=>1,'anzahl_anmeldungen' => 5],
            ['E_Mail'=>'root@emensa.example','password'=>'80b9c96865479e95e6a06e214efdd6242b484ed79f4ce0c11618fe5153916821ba0ac5a097c18088a89f4611d7aaa0808ff624f36800dd4e1c8473ba9bc2ae3f','admin'=>1,'anzahl_anmeldungen' => 400],
            ['E_Mail'=>'yikes@emensa.example','password'=>'80b9c96865479e95e6a06e214efdd6242b484ed79f4ce0c11618fe5153916821ba0ac5a097c18088a89f4611d7aaa0808ff624f36800dd4e1c8473ba9bc2ae3f','admin'=>1,'anzahl_anmeldungen' => 2],

        ]);
    }
}
