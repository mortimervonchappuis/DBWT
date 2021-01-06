<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBewertungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bewertungs', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at');
            $table->string('beschreibung');
            $table->unsignedInteger('sterne');
            $table->tinyInteger('highlight')->default(0);
            $table->foreignId('gericht_id')
                ->references('id')->
                on('gerichtes')->
                onDelete('cascade');
            $table->foreignId('benutzer_id')->references('id')->on('benutzers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bewertungs');
    }
}
