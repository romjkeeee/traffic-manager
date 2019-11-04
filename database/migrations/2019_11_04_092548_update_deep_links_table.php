<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDeepLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deep_links', function (Blueprint $table) {
            $table->string('application_id')->nullable()->change();
            $table->string('black_link')->nullable()->change();
            $table->string('webmaster_id')->nullable()->change();
            $table->string('offer_id')->nullable()->change();
            $table->string('sub1')->nullable()->change();
            $table->string('sub2')->nullable()->change();
            $table->string('sub3')->nullable()->change();
            $table->string('comment')->nullable()->change();
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
