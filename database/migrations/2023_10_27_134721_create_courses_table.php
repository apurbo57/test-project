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
        Schema::create('courses', function (Blueprint $table) {
            $table->id('id');
            $table->string('course_name');
            $table->integer('teacher_id');
            $table->longText('course_description');
            $table->decimal('course_price', 8, 2);
            $table->date('reg_date')->nullable();
            $table->date('ass_date')->nullable();
            $table->integer('batch_no');
            $table->integer('classes');
            $table->tinyInteger('course_type')->default(1);
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
