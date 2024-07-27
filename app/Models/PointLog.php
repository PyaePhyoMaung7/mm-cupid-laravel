<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PointLog extends Model
{
    use HasFactory;

    protected $table = 'point_logs';

    protected $fillable = [
        'member_id',
        'user_id',
        'point',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by'
    ];

    public function getMemberByPointLog(): BelongsTo
    {
        return $this->belongsTo(
            Member::class,
            'member_id',
            'id'
        );
    }

    public function getUserByPointLog(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'id'
        );
    }
}
