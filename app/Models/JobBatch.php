<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobBatche extends Model
{
    protected $fillable = ['name', 'total_jobs', 'pending_jobs', 'failed_jobs', 'failed_job_ids', 'options', 'cancelled_at', 'finished_at'];
}
