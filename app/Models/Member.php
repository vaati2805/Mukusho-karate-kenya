<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Member extends Model
{
    protected $fillable = [
        'member_type',
        'full_name',
        'email',
        'image',
        'phone',
        'gender',
        'date_of_birth',
        'program',
        'school',
        'location',
        'club',
        'belt_rank',
        'emergency_contact',
        'emergency_phone',
        'guardian_name',
        'guardian_phone',
        'relationship',
        'group_id',
        'membership_fee',
        'membership_paid',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'membership_fee' => 'decimal:2',
            'membership_paid' => 'boolean',
        ];
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function latestPayment()
    {
        return $this->hasOne(Payment::class)->latestOfMany();
    }

    public function totalPaid(): float
    {
        return $this->payments()->where('status', 'completed')->sum('amount');
    }
}
