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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id');
            $table->string('title');
            $table->string('content');
            $table->string('image')->nullable();
            $table->integer('status')->comment("1:No process, 2:Processing, 3:Processed");
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('problem_handler_user_id')->nullable();
            $table->integer('is_send_mail')->comment("1:Unsent, 2:Sent");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
