<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicatorDisagreggationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicator_disaggregations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('created_by')->nullable();
            $table->timestamps();
            $table->foreignId('indicator_id')
            ->constrained()
            ->onDelete('cascade'); 
            $table->foreignId('disaggregation_id')
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
        Schema::dropIfExists('indicator_disagreggations');
    }
}
