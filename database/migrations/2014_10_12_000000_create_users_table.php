<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('employee_code');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('full_name');
            $table->string('username')->nullable();
            $table->dateTime('birthday')->nullable();
            $table->string('avatar')->nullable();
            $table->string('apartment_number')->nullable();
            $table->string('village')->nullable();
            $table->string('wards')->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->integer('role')->comment("1:Client, 2:Admin, 3:Super Admin");
            $table->integer('status')->comment("1:Open Account, 2:Lock Account");
            $table->string('email');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
