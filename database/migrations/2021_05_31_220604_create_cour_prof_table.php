<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourProfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cour_prof', function (Blueprint $table) {
            $table->unsignedBigInteger('cour_id')->unsigned();
            $table->foreign('cour_id')->references('cour_id')->on('cours');

            $table->unsignedBigInteger('prof_id')->unsigned();
            $table->foreign('prof_id')->references('prof_id')->on('profs');
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
        Schema::dropIfExists('cour_prof');
    }
}
