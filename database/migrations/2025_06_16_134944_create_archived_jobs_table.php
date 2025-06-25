<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivedJobsTable extends Migration
{
    public function up(): void
    {
        Schema::create('archived_jobs', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('job_id')->constrained()->onDelete('cascade');
            $table->timestamp('created_at')->useCurrent();

            $table->primary(['user_id', 'job_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('archived_jobs');
    }
}
