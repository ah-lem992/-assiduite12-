<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnGroupeidToSeances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seances', function (Blueprint $table) {

            $table->unsignedBigInteger('specialite_id')->nullable();

            $table->foreign('specialite_id')->references('specialite_id')->on('specialites');

            $table->unsignedBigInteger('groupe_id')->unsigned()->nullable();

            $table->foreign('groupe_id')->references('groupe_id')->on('groupes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seances', function (Blueprint $table) {

            $table->dropForeign(['groupe_id']);
            $table->dropColumn('groupe_id');

            $table->dropForeign(['specialite_id']);
            $table->dropColumn('specialite_id');
        });
    }
}
