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
        Schema::create('art_caracts', function (Blueprint $table) {
            $table->id();
            $table->string('valeur');
            $table->timestamps();
            $table->unsignedBigInteger('id_art');
            $table->foreign('id_art')
                ->references('id')
                ->on('articles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('id_caract');
            $table->foreign('id_caract')
                ->references('id')
                ->on('caracteristiques')
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
        Schema::dropIfExists('art_caracts');
    }
};
