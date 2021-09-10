<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectedDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collected_data', function (Blueprint $table) {
            $table->id();
            $table->string('values');
            $table->string('notes')->nullable();
            $table->date('collection_date');
            $table->string('file_name')->nullable();
            $table->string('file_url')->nullable();
            $table->json('disaggregation_values')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('indicator_id')
            ->constrained()
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collected_data');
    }
}
