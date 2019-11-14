<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            $table->string('link_android')->nullable();
            $table->string('link_ios')->nullable();
            $table->string('deeplink')->nullable()->change();
            $table->string('comment')->nullable()->change();
            $table->integer('organisation_id')->nullable();
            $table->dropColumn('link');
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
