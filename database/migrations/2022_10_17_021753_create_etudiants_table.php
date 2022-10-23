<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            //Ajouter les champs à la table etudiants
            //Nom d'étudiant
            $table->string('nom',50);
            //Adrresse 
            $table->string('adresse',100);
            //Numéro de téléphone
            $table->string('phone',20);
            //Émail
            $table->string('email', 60)->unique();
            //date de naissance
            $table->date('dateDeNaissance');
            //crée la colonne pour la clé étrangère
            $table->integer('villeId')->unsigned(); 
            //Référer la colonne à la clé de la ville et le mattre comme clé étrangère 
            $table->foreign('villeId')->references('id')->on('villes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiants');
    }
}
