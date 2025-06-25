<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobTagsTable extends Migration
{
    public function up(): void
    {
        Schema::create('job_tags', function (Blueprint $table) {
            $table->foreignId('job_id')->constrained()->onDelete('cascade');
            $table->foreignId('tag_id')->constrained()->onDelete('cascade');
            $table->primary(['job_id', 'tag_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_tags');
    }
}
