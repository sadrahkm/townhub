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
            $table->string('name');
            $table->string('email')->unique();
            $table->tinyInteger('role')->default('0');
            $table->string('password');
            $table->string('phone',25)->nullable();
            $table->text('address')->nullable();
            $table->string('company')->nullable();
            $table->string('website', 255)->nullable();
            $table->text('notes')->nullable();
            $table->string('avatar_name')->default(null)->nullable();
            $table->string('header_background')->default(null)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
