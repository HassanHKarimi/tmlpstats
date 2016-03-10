<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alerts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('level');
            $table->string('message');
            $table->boolean('active')->default(true);
            $table->integer('created_by_user_id')->unsigned();
            $table->timestamp('valid_at')->useCurrent();
            $table->timestamp('expires_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('alerts', function (Blueprint $table) {
            $table->foreign('created_by_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('alerts');
    }
}
