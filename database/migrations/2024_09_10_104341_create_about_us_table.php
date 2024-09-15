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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->text('introduction')->nullable();
            $table->string('img_introduction')->nullable();
            $table->text('vision')->nullable();
            $table->enum('admission_open', ['Y', 'N'])->default('Y');
            $table->string('img_vision')->nullable();
            $table->text('mission')->nullable();
            $table->string('img_mission')->nullable();
            $table->string('student_each_year')->nullable();
            $table->string('professional_teacher')->nullable();
            $table->string('awards')->nullable();
            $table->string('year_of_experiences')->nullable();
            $table->enum('status', ['Y', 'N'])->default('Y');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
