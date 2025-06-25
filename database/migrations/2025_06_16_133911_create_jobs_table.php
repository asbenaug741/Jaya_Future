<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('job_kind', ['Job', 'Internship', 'Training']);
            $table->string('company_name');
            $table->string('location');
            $table->string('category');
            $table->enum('job_type', ['On Site', 'Hybrid', 'Remote' ]);
            $table->text('description');
            $table->text('requirement');
            $table->text('benefit');
            $table->string('company_logo')->nullable();
            $table->date('date_posted')->useCurrent();
            $table->enum('status', ['Open', 'Paused', 'Closed'])->default('Open');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
}
