<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('genre');
            $table->string('statut');
            $table->string('commune');
            $table->string('adresse');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('telephone');
            $table->boolean('ordinateur');
            $table->string('objectif');
            $table->string('photo');
            $table->string('abo');
            $table->string('password');
            $table->bigInteger('formulaire_id')->unsigned();
            $table->foreign('formulaire_id')
                ->on('formulaires')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->bigInteger('group_id')->unsigned()->nullable();
            $table->foreign('group_id')
                ->on('groups')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->bigInteger('role_id')->unsigned();
            $table->foreign('role_id')
                ->on('roles')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
