<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cohort extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date', // Optional: End date for the cohort
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('enrolled_at'); // ManyToMany with pivot table
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class)->withPivot('start_date', 'end_date'); // ManyToMany with pivot table (optional)
    }
}
