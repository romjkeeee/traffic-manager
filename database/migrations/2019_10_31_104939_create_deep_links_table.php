<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeepLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deep_links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('application_id');
            $table->string('black_link');
            $table->string('webmaster_id');
            $table->string('offer_id');
            $table->string('sub1');
            $table->string('sub2');
            $table->string('sub3');
            $table->string('comment');
            $table->string('redirect');
            $table->string('install');
            $table->timestamps();
        });

        Schema::table('deep_links', function($table) {
            $table->unsignedBigInteger('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deep_links');
    }
}
