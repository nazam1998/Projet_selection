<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acces', function (Blueprint $table) {
            $table->id();
            $table->boolean('write');
            $table->boolean('responsable');
            $table->unsignedBigInteger('auth_role');
            $table->unsignedBigInteger('permission_role');
            $table->foreign('auth_role')->on('roles')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('permission_role')->on('roles')->references('id')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('acces');
    }
}
