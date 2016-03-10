<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlertCenterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alert_center', function (Blueprint $table) {
            $table->integer('alert_id')->unsigned()->index();
            $table->integer('center_id')->unsigned()->index();
            $table->timestamps();
        });

        Schema::table('alert_center', function (Blueprint $table) {
            $table->foreign('alert_id')->references('id')->on('alerts');
            $table->foreign('center_id')->references('id')->on('centers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('alert_center');
    }
}
