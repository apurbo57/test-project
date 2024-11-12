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
        Schema::create('regular_students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->onDelete('restrict');
            $table->string('nameE');
            $table->string('nameB');
            $table->string('fatherNameE');
            $table->string('fatherNameB');
            $table->string('motherNameE');
            $table->string('motherNameB');
            $table->string('email');
            $table->string('phone');
            $table->string('Gphone');
            $table->enum('shift',['1','2']);
            $table->enum('religion',['islam','hinduism','buddhism','christianity','others']);
            $table->enum('gender',['male','female','other','christianity','others']);
            $table->string('birthday');
            $table->string('national_id');
            $table->enum('employment_status',['student','freelancer','businessman','entrepreneur','job_seeker','job_holder']);
            $table->string('present_address');
            $table->string('present_postal_code');
            $table->enum('present_division',['dhaka','chittagong','rajshahi','khulna','barisal','sylhet','rangpur','mymensingh']);
            $table->string('present_per_district');
            $table->string('present_sub_district');
            $table->enum('level_of_education',['SSC/Dakhil/Equivalent','HSC/Alim/Equivalent','Bachelor/Honours/Equivalent','Diploma','Bachelor 1st Year','Bachelor 2nd Year','Bachelor 3rd Year','Bachelor Final Year','Master Degree','PhD','Above PSC','Others']);
            $table->string('institute_name');
            $table->string('subject');
            $table->string('passing_year');
            $table->string('image')->nullable();
            $table->enum('status',['pending','approved','rejected'])->default('pending');
            $table->string('transaction_id')->nullable();
            $table->enum('payment_type',['offline','online'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regular_students');
    }
};
