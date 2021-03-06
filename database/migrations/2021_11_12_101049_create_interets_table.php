<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInteretsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interets', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->timestamps();
        });
        Schema::create('interet_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('interet_id');
            $table->foreign('user_id')->on('users')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('interet_id')->on('interets')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('formulaire_interet', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('interets');
    }
}
