<?php

namespace App\Models;

use App\Models\MemberHobby;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hobby extends Model
{
    use HasFactory;

    protected $table = 'hobbies';

    protected $fillable = [
        'name',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by'
    ];

    public function getMemberHobbiesByHobby(): HasMany
    {
        return $this->hasMany(
            MemberHobby::class,
            'hobby_id',
            'id'
        );
    }
}
