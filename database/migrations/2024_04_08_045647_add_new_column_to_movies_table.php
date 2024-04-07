<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnToMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->integer('published_year')->comment('公開年')->after('image_url');;
            $table->tinyInteger('is_showing')->default(0)->comment('上映中かどうか');
            $table->text('description')->comment('概要');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->integer('published_year')->comment('公開年')->after('image_url');;
            $table->tinyInteger('is_showing')->default(0)->comment('上映中かどうか');
            $table->text('description')->comment('概要');
        });
    }
}
