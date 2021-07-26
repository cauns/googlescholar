<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumTotalToTableCites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cites', function (Blueprint $table) {
            $table->dropColumn('total');
            $table->dropColumn('total_not_by_author');
            $table->dropColumn('total_only_author');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cites', function (Blueprint $table) {
            $table->integer('total');
            $table->integer('total_only_author');
            $table->integer('total_not_by_author');
        });
    }
}
