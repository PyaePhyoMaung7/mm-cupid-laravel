<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CronJob extends Model
{
    use HasFactory;

    protected $table = 'cron_job_logs';

    protected $fillable = [
        'cron_job_number',
        'sender_id',
        'suggest_id',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by'
    ];
}
