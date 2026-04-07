<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['membership_id', 'duration_id', 'start_date', 'end_date', 'price_paid'])]
class Period extends Model
{
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    /**
     * The "booted" method of the model.
     *  
     * @return void
     */
    protected static function booted(): void
    {
        // Apply the format to the start and end dates before saving
        static::saving(function (Period $period) {
            $period->start_date = $period->start_date->startOfDay();

            $period->end_date = $period->end_date->startOfDay();
        });
    }

    /**
     * Get the duration assigned to the period.
     */
    public function duration(): BelongsTo
    {
        return $this->belongsTo(Duration::class);
    }

    /**
     * Get the membership that owns the period.
     */
    public function membership(): BelongsTo
    {
        return $this->belongsTo(Membership::class);
    }
}
