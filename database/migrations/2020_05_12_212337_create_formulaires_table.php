<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulaires', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->timestamps();
        });

        Schema::create('formulaire_interet', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->bigInteger('interet_id')->unsigned();
            $table->foreign('interet_id')
                ->on('interets')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->bigInteger('formulaire_id')->unsigned();
            $table->foreign('formulaire_id')
                ->on('formulaires')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('formulaires');
    }
}
