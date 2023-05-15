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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table -> foreignId('tourist_attraction_id') -> constrained() -> onDelete('cascade');
            $table -> foreignId('user_id') -> constrained() -> onDelete('cascade');
            $table->string('uuid')->nullable()->unique();
            $table ->string('name');
            $table->string('phone_number');
            $table->string('email');
            $table -> date('tanggal_pemesanan');
            $table -> boolean('is_verify')->default(false);
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
        Schema::dropIfExists('tiket_model');
    }
};
