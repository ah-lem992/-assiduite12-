<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPromoId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('groupes', function (Blueprint $table) {

            $table->unsignedBigInteger('promo_id');

            //$table->integer('promo_id')->unsigned()->after('groupe_id');
            $table->foreign('promo_id')->references('id')->on('promos');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('groupes', function (Blueprint $table) {

            $table->dropForeign(['promo_id']);
            $table->dropColumn('promo_id');
            //
        });
    }
}
