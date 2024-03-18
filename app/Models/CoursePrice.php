<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CoursePrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'currency', // Optional: Specify currency (e.g., 'USD', 'EUR')
        'description', // Optional: Description for different price types (e.g., 'Regular Price')
        'course_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class); // BelongsTo relationship with Course
    }

    // Optional: Relationship with Coupon model (if you want to link prices to coupons)
    public function coupons()
    {
        return $this->belongsToMany(Coupon::class)->withPivot(['discount_percentage', 'applied_count']); // ManyToMany with pivot table
    }
}
