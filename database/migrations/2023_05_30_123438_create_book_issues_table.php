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
        Schema::create('book_issues', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('book_name');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('book_id');
            $table->timestamps();
            $table->foreign('student_id')
                ->references('id')
                ->on('students')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('book_id')
                ->references('id')
                ->on('books')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_issues');
    }
};
