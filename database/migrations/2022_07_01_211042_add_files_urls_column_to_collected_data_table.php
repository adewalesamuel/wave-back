<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFilesUrlsColumnToCollectedDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('collected_data', function (Blueprint $table) {
            $table->dropColumn('file_url');
            $table->json('files_urls')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('collected_data', function (Blueprint $table) {
            $table->string('file_url');
            $table->dropColumn('files_urls');
        });
    }
}
