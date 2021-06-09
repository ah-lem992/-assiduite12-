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
            $table->bigIncrements('etud_id');
            $table->unsignedBigInteger('groupe_id')->unsigned()->nullable();
            $table->foreign('groupe_id')->references('groupe_id')->on('groupes');
            $table->String('nom');
            $table->String('prenom');
            $table->string('sexe');
            $table->date('naissance');
            $table->string('phone');
            $table->string('email');
            $table->string('adresse');
            $table->string('photo');
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
        Schema::dropIfExists('etudiants');

    }
}
