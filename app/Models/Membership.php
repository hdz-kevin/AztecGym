<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable(['member_id', 'membership_type_id'])]
class Membership extends Model
{
    /**
     * Get the member that owns the membership.
     */
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    /**
     * Get the membership type of the membership.
     */
    public function membershipType(): BelongsTo
    {
        return $this->belongsTo(MembershipType::class);
    }

    /**
     * Get the periods of the membership.
     */
    public function periods(): HasMany
    {
        return $this->hasMany(Period::class);
    }

    /**
     * Acceso directo al periodo más reciente (el activo o último).
     */
    public function latestPeriod(): HasOne
    {
        return $this->hasOne(Period::class)->latestOfMany('end_date');
    }
}
