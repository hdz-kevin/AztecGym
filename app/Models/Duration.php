<?php

namespace App\Models;

use App\Enums\DurationUnit;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['membership_type_id', 'name', 'amount', 'unit', 'price'])]
class Duration extends Model
{
    protected $casts = [
        'unit' => DurationUnit::class,
    ];

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
