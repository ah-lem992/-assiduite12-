<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPromoidToPresences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('presences', function (Blueprint $table) {
            $table->unsignedBigInteger('promo_id')->nullable();

            $table->foreign('promo_id')->references('id')->on('promos');

            $table->unsignedBigInteger('specialite_id')->nullable();

            $table->foreign('specialite_id')->references('specialite_id')->on('specialites');


            $table->datetime('deleted_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('presences', function (Blueprint $table) {
            $table->dropForeign(['promo_id']);

            $table->dropForeign(['specialite_id']);

            $table->dropColumn('deleted_at');

        });
    }
}
