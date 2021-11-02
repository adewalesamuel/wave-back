<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_indicators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_id')
            ->constrained()
            ->onDelete('cascade');
            $table->foreignId('indicator_id')
            ->constrained()
            ->onDelete('cascade'); 
            $table->bigInteger('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_indicators');
    }
}
