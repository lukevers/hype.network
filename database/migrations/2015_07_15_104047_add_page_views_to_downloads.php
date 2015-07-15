<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPageViewsToDownloads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('files', function(Blueprint $table) {
            if (env('DB_CONNECTION', 'mysql') === 'mysql') {
                $table->integer('views')->default(0)->after('owner');
            } else {
                $table->integer('views')->default(0);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('files', function(Blueprint $table) {
            $table->dropColumn('views');
        });
    }
}
