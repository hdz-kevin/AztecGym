<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Member extends Model
{
    use HasFactory;

    /**
     * @inheritdoc
     */
    protected static function booted(): void
    {
        // Generate a unique code for the member before inserting
        static::creating(function (Member $member) {
            do {
                $code = (string) random_int(10000, 99999);
            } while (self::where('code', $code)->exists());

            $member->code = $code;
        });
    }

    /**
     * Get the memberships of the member.
     */
    public function memberships(): HasMany
    {
        return $this->hasMany(Membership::class);
    }

    /**
     * Acceso directo a todos los periodos del socio
     * a través de su membresía.
     */
    public function periods(): HasManyThrough
    {
        return $this->hasManyThrough(Period::class, Membership::class);
    }

    /**
     * Get the single visits of the member.
     */
    public function visits(): HasMany
    {
        return $this->hasMany(Visit::class);
    }
}
