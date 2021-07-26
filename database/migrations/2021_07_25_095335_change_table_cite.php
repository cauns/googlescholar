<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTableCite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cites', function (Blueprint $table) {
            $table->string('link_get')->nullable();
            $table->string('link')->nullable();
            $table->string('title')->nullable();
            $table->string('author')->nullable();
            $table->string('sub_title')->nullable();
            $table->string('year')->nullable();
            $table->boolean('status')->default(0);
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
            $table->dropColumn('link_get');
            $table->dropColumn('link');
            $table->dropColumn('title');
            $table->dropColumn('author');
            $table->dropColumn('sub_title');
            $table->dropColumn('year');
            $table->dropColumn('status');
        });
    }
}
