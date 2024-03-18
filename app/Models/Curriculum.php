<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Curriculum extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'course_id'
    ];

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

}
