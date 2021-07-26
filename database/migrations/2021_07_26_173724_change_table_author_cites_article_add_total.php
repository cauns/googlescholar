<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTableAuthorCitesArticleAddTotal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('author_cite_articles', function (Blueprint $table) {
            $table->integer('total')->default(0);
            $table->integer('total_only_author')->default(0);
            $table->integer('total_not_by_author')->default(0);
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
        Schema::table('author_cite_articles', function (Blueprint $table) {
            $table->dropColumn('total');
            $table->dropColumn('total_only_author');
            $table->dropColumn('total_not_by_author');
            $table->dropColumn('status');
        });
    }
}
