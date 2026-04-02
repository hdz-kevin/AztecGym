<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
