<?php

namespace App\Models;

use App\Models\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MemberTransaction extends Model
{
    use HasFactory;

    protected $table = 'member_transactions';

    protected $fillable = [
        'member_id',
        'name',
        'status',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by'
    ];

    public function getMemberByMemberTransaction(): BelongsTo
    {
        return $this->belongsTo(
            Member::class,
            'member_id',
            'id'
        );
    }
}
