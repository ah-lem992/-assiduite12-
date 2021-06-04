<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCourId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profs', function (Blueprint $table) {
            $table->unsignedBigInteger('cour_id');
            //$table->integer('cour_id')->unsigned()->after('groupe_id');
            $table->foreign('cour_id')->references('cour_id')->on('cours');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profs', function (Blueprint $table) {
            $table->dropForeign(['cour_id']);
            $table->dropColumn('cour_id');
        });
    }
}
