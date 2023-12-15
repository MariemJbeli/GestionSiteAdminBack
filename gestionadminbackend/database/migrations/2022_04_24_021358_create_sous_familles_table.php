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
        Schema::create('sous_familles', function (Blueprint $table) {
            $table->id();
            $table->string('nomSF');
            $table->timestamps();
            $table->unsignedBigInteger('id_F');
            $table->foreign('id_F')
                ->references('id')
                ->on('familles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sous_familles');
    }
};
