<?php

namespace App\Models;

use App\Models\Hobby;
use App\Models\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MemberHobby extends Model
{
    use HasFactory;

    protected $table = 'member_hobbies';

    protected $fillable = [
        'member_id',
        'hobby_id',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by'
    ];

    public function getMembersByMemberHobby(): BelongsTo
    {
        return $this->belongsTo(
            Member::class,
            'member_id',
            'id'
        );
    }

    public function getHobbiesByMemberHobby(): BelongsTo
    {
        return $this->belongsTo(
            Hobby::class,
            'hobby_id',
            'id'
        );
    }
}
