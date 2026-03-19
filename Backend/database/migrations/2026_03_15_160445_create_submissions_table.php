<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('problem_id')->constrained()->onDelete('cascade');
            $table->longText('code');
            $table->string('language');
            $table->enum('status', [
                'accepted',
                'wrong_answer',
                'time_limit_exceeded',
                'runtime_error',
                'compilation_error'
            ]);
            $table->integer('runtime_ms')->nullable();
            $table->integer('memory_kb')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};