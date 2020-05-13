<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            // $table->bigInteger('responsable_id')->unsigned();
            // $table->foreign('responsable_id')
            //     ->on('users')
            //     ->references('id')
            //     ->onDelete('cascade')
            //     ->onUpdate('cascade');
            // $table->bigInteger('coach_id')->unsigned()->nullable();
            // $table->foreign('coach_id')
            //     ->on('users')
            //     ->references('id')
            //     ->onDelete('cascade')
            //     ->onUpdate('cascade');
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
        Schema::dropIfExists('groups');
    }
}