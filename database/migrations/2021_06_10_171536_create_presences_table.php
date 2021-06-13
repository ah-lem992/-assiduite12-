<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presences', function (Blueprint $table) {
            $table->bigIncrements('presence_id');

            $table->unsignedBigInteger('id')->unsigned()->nullable();
            //$table->integer('cour_id')->unsigned()->after('groupe_id');
            $table->foreign('id')->references('id')->on('seances');

            $table->unsignedBigInteger('prof_id')->unsigned();
            //$table->integer('cour_id')->unsigned()->after('groupe_id');
            $table->foreign('prof_id')->references('prof_id')->on('profs');

            $table->unsignedBigInteger('etud_id')->unsigned()->nullable();
            //$table->integer('cour_id')->unsigned()->after('groupe_id');
            $table->foreign('etud_id')->references('etud_id')->on('etudiants');



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
        Schema::dropIfExists('presences');
    }
}
