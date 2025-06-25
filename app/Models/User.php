<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Job;
use App\Models\ArchivedJob;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'birth_date',
        'university',
        'phone_number',
        'profile_picture',
        'role',
        'employment_status',
        'job_title',
        'location',
        'resume'
    ];

    protected $hidden = [
        'password',
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function archivedJobs()
    {
        return $this->belongsToMany(Job::class, 'archived_jobs')
            ->using(ArchivedJob::class);
    }
}
