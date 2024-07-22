<?php

namespace App\Models;

use App\Models\City;
use App\Models\MemberGallery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Authenticatable
{
    use HasFactory;

    protected $table = 'members';

    protected $fillable = [
        'username',
        'password',
        'email',
        'phone',
        'email_confirm_code',
        'gender',
        'date_of_birth',
        'education',
        'city_id',
        'height_feet',
        'height_inches',
        'status',
        // 'love_status',
        'about',
        'partner_gender',
        'partner_min_age',
        'partner_max_age',
        'last_login',
        'point',
        'work',
        'religion',
        'thumbnail',
        'verify_photo',
        'view_count',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by'
    ];

    protected $hidden = [
        'password',
    ];

    public function getCityByMember(): BelongsTo
    {
        return $this->belongsTo(
            City::class,
            'city_id',
            'id'
        );
    }

    public function getGalleryByMember(): HasMany
    {
        return $this->hasMany(
            MemberGallery::class,
            'member_id',
            'id'
        )->whereNull('deleted_at');
    }

    public function getMemberHobbiesByMember(): HasMany
    {
        return $this->hasMany(
            MemberHobby::class,
            'member_id',
            'id'
        )->whereNull('deleted_at');
    }

    public function getSentDateRequestsByMember(): HasMany
    {
        return $this->hasMany(
            DateRequest::class,
            'invite_id',
            'id'
        );
    }

    public function getReceiveDateRequestsByMember(): HasMany
    {
        return $this->hasMany(
            DateRequest::class,
            'accept_id',
            'id'
        );
    }



}
