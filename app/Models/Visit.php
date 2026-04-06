<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['member_id', 'visit_type_id', 'visitor_name', 'visit_at', 'price_paid'])]
class Visit extends Model
{
    /**
     * Get the visit type of the visit.
     */
    public function visitType(): BelongsTo
    {
        return $this->belongsTo(VisitType::class);
    }

    /**
     * Get the member that owns the visit, or null if the visitor is not a member.
     */
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }
}
