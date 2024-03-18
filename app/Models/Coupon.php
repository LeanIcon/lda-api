<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'discount_percentage',
        'description',
        'start_date',
        'end_date',
        'usage_limit', // Total number of times the coupon can be used
        'applied_count', // Number of times the coupon has been used
    ];

    // Optional: Relationship with CoursePrice model (if you want to link coupons to prices)
    public function coursePrices(): BelongsTo
    {
        return $this->belongsTo(CoursePrice::class);
    }
}
