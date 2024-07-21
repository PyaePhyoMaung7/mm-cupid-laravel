<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DateRequest extends Model
{
    use HasFactory;

    protected $table = 'date_requests';

    protected $fillable = [
        'invite_id',
        'accept_id',
        'status',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by'
    ];

    public function getInviteMemberInfoById(): BelongsTo
    {
        return $this->belongsTo(
            Member::class,
            'invite_id',
            'id'
        );
    }
}
