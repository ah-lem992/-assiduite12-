<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seances', function (Blueprint $table) {
                $table->bigIncrements('id');

                $table->unsignedBigInteger('cour_id');
                    //$table->integer('cour_id')->unsigned()->after('groupe_id');
                $table->foreign('cour_id')->references('cour_id')->on('cours');

                $table->unsignedBigInteger('prof_id')->unsigned();
                $table->foreign('prof_id')->references('prof_id')->on('profs');

                $table->unsignedBigInteger('salle_id')->unsigned();
                $table->foreign('salle_id')->references('salle_id')->on('salles');

                $table->time('start_time');

                $table->time('end_time');

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
        Schema::dropIfExists('seances');
    }
}
