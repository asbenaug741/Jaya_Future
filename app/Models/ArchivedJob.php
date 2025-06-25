<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ArchivedJob extends Pivot
{
    protected $table = 'archived_jobs';

    protected $fillable = [
        'user_id',
        'job_id',
    ];
}
