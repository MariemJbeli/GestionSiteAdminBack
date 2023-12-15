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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('desgnArt');
            $table->string('prix');
            $table->string('ancienPrix');
            $table->string('etat');
            $table->string('dureeGarantie');
            $table->string('refInternational');
            $table->string('livraison');
            $table->string('image');
            $table->timestamps();
            $table->unsignedBigInteger('id_SF');
            $table->foreign('id_SF')
                ->references('id')
                ->on('sous_familles')
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
        Schema::dropIfExists('articles');
    }
};
