<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Duration extends Model
{
    /**
     * Get the membership type that the duration belongs to.
     */
    public function membershipType(): BelongsTo
    {
        return $this->belongsTo(MembershipType::class);
    }

    /**
     * Get the periods that use this duration.
     */
    public function periods(): HasMany
    {
        return $this->hasMany(Period::class);
    }
}
