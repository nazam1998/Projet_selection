<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailings', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->on('users')->references('id')->onUpdate('cascade')->onDelete('cascade');
            
            $table->unsignedBigInteger('group_id')->nullable();
            $table->foreign('group_id')->on('groups')->references('id')->onUpdate('cascade')->onDelete('cascade');
            
            $table->unsignedBigInteger('role_id')->nullable();
            $table->foreign('role_id')->on('roles')->references('id')->onUpdate('cascade')->onDelete('cascade');
            
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
        Schema::dropIfExists('mailings');
    }
}
