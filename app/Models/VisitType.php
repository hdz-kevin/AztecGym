<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'price'])]
class VisitType extends Model
{
    /**
     * Get the visits of the visit type.
     */
    public function visits(): HasMany
    {
        return $this->hasMany(Visit::class);
    }
}
