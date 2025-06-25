<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('job_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('phone_number', 20);
            $table->string('cv');
            $table->string('additional_file')->nullable();
            $table->text('cover_letter');
            $table->enum('status', ['In Review', 'Approved', 'Rejected'])->default('In Review');
            $table->timestamps();
            $table->date('application_date');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
}
