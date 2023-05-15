<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table -> foreignId('tourist_attraction_id') -> constrained() -> onDelete('cascade');
            $table->string('kode_promo')->unique();
            $table ->string('name');
            $table->integer('diskon');
            $table->integer('minimal_promo');
            $table -> dateTime('expired');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promos_model');
    }
};
