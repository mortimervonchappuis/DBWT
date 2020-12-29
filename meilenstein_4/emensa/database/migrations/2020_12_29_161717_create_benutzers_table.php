<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBenutzersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benutzers', function (Blueprint $table) {
            $table->id();
            $table->string('e-mail',100)->unique();
            $table->string('passwort',200);
            $table->boolean('admin');
            $table->integer('anzahl_fehler');
            $table->integer('anzahl_anmeldung');
            $table->timestamp('letzte_anmeldung');
            $table->timestamp('fehler_anmeldung');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('benutzers');
    }
}
