<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGerichtHatAllergensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gericht_hat_allergens', function (Blueprint $table) {
            $table->char('code',4)->references('code')->on('allergens')->cascadeOnDelete();
            $table->foreignId('gericht_id')->references('id')->on('gerichtes')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gericht_hat_allergens');
    }
}
