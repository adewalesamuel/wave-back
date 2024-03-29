<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('lastname');
            $table->string('firstname');
            $table->string('profile_url')->nullable();
            $table->string('tel')->nullable();
            $table->string('email')->unique();
            $table->json('permissions')->nullable();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
            $table->foreignId('role_id')
            ->nullable()
            ->constrained()
            ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
