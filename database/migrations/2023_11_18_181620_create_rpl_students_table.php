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
        Schema::create('rpl_students', function (Blueprint $table) {
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
            $table->string('Gname');
            $table->enum('religion',['islam','hinduism','buddhism','christianity','others']);
            $table->enum('gender',['male','female','other','christianity','others']);
            $table->string('birthday');
            $table->string('national_id');

            $table->string('present_address');
            $table->string('present_postal_code');
            $table->string('present_post_office');
            $table->enum('present_division',['dhaka','chittagong','rajshahi','khulna','barisal','sylhet','rangpur','mymensingh']);
            $table->string('present_per_district');
            $table->string('present_sub_district');

            $table->string('permanent_address');
            $table->string('permanent_postal_code');
            $table->string('permanent_post_office');
            $table->enum('permanent_division',['dhaka','chittagong','rajshahi','khulna','barisal','sylhet','rangpur','mymensingh']);
            $table->string('permanent_per_district');
            $table->string('permanent_sub_district');

            $table->enum('level_of_education',['SSC/Dakhil/Equivalent','HSC/Alim/Equivalent','Bachelor/Honours/Equivalent','Diploma','Bachelor 1st Year','Bachelor 2nd Year','Bachelor 3rd Year','Bachelor Final Year','Master Degree','PhD','Above PSC','Others']);
            $table->string('institute_name');
            $table->string('passing_year');
            $table->string('cgpa');
            $table->string('occupation');
            $table->string('experience_year');
            $table->string('image')->nullable();
            $table->string('signature')->nullable();
            $table->string('nid_image')->nullable();
            $table->string('work_certificate')->nullable();
            $table->string('writen_description')->nullable();
            $table->enum('status',['pending','approved','rejected'])->default('pending');
            $table->string('transaction_id')->nullable();
            $table->enum('payment_type',['offline','online'])->nullable();

            $table->boolean('is_disability')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rpl_students');
    }
};
