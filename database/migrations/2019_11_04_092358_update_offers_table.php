<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->string('url')->nullable()->change();
            $table->string('countries_id')->nullable()->change();
            $table->string('application_id')->nullable()->change();
            $table->integer('organisation_id')->nullable();
            $table->string('user_id')->nullable()->change();
            $table->string('deeplink')->nullable()->change();
            $table->string('comment')->nullable();
            $table->string('add_param')->nullable();
            $table->string('redirect')->nullable()->default(0);
            $table->string('install')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
