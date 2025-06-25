<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'job_kind',
        'company_name',
        'location',
        'category',
        'job_type',
        'description',
        'requirement',
        'benefit',
        'company_logo',
        'date_posted',
        'status'
    ];

    protected $casts = [
        'date_posted' => 'date',
    ];


    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'job_tags');
    }

    public function archivedByUsers()
    {
        return $this->belongsToMany(User::class, 'archived_jobs');
    }
}
