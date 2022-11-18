<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_files', function (Blueprint $table) {
            $table->id();
            $table->string('titre',45);
            $table->string('file');
            $table->integer('etudiants_id')->unsigned();
            $table->foreign('etudiants_id')->references('id')->on('etudiants');
            $table->integer('etudiants_users_id')->unsigned();
            $table->foreign('etudiants_users_id')->references('id')->on('users');
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
        Schema::dropIfExists('_files');
    }
}
