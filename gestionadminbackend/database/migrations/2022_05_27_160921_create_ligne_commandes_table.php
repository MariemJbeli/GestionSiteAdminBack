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
        Schema::create('ligne_commandes', function (Blueprint $table) {
            $table->id();
            $table->string('quantite');

            $table->unsignedBigInteger('id_com');
            $table->foreign('id_com')
                ->references('id')
                ->on('commandes');
            $table->unsignedBigInteger('id_art');
            $table->foreign('id_art')
                    ->references('id')
                    ->on('articles');
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
        Schema::dropIfExists('ligne_commandes');
    }
};
