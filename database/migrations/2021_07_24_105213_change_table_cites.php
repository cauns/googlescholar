<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTableCites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cites', function (Blueprint $table) {
            $table->integer('total')->default(0)->change();
            $table->integer('total_only_author')->default(0)->change();
            $table->integer('total_not_by_author')->default(0)->change();
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
            $table->integer('total')->change();
            $table->integer('total_only_author')->change();
            $table->integer('total_not_by_author')->change();
        });
    }
}
