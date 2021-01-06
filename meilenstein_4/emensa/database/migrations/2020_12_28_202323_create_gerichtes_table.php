<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGerichtesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gerichtes', function (Blueprint $table) {
            $table->id();
            $table->string('name',80)->unique();
            $table->string('beschreibung',800);
            $table->timestamps();

            $table->boolean('vegetarisch')->default(false);
            $table->boolean('vegan')->default(false);
            $table->double('preis_intern');
            $table->double('preis_extern');
            $table->string('bildname',200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gerichtes');
    }
}
