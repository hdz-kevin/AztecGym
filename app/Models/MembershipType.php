<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name'])]
class MembershipType extends Model
{
    use HasFactory;

    /**
     * Get the available durations for the membership type.
     */
    public function durations(): HasMany
    {
        return $this->hasMany(Duration::class);
    }

    /**
     * Get the memberships for the membership type.
     */
    public function memberships(): HasMany
    {
        return $this->hasMany(Membership::class);
    }
}
