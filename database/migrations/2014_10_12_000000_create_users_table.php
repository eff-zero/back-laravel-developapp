<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->foreignId('rol_id')->constrained();
            $table->string('name');
            $table->string('lastname');
            $table->string('city');
            $table->string('address');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('state')->default(1); // 1: activo, 0: no activo
            $table->timestamps();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->rememberToken();
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
};
