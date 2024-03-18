<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use phpDocumentor\Reflection\Types\Boolean;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'is_trainer',
        'is_student',
        'password',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_admin' => 'boolean',
        'is_trainer' => 'boolean',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

        // app/User.php

        public function getJWTIdentifier()
        {
          return $this->getKey();
        }

        public function getJWTCustomClaims()
        {
          return [];
        }



     // Mutator/Accessor example (optional)
     public function getIsTrainerAttribute($value)
     {
         return (bool) $value; // Ensure it's cast to boolean
     }

     public function setIsTrainerAttribute($value)
     {
         $this->attributes['is_trainer'] = (bool) $value; // Cast to boolean
     }


    // Optional: Relationship methods (if using in your application logic)
    public function trainer()
    {
        return $this->hasOne(Trainer::class);
    }

    public function associatedUsers()
    {
        return $this->hasMany(User::class, 'associated_user_id', 'id');
    }

    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function participant()
    {
        return $this->hasOne(Participant::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_trainers', 'user_id', 'course_id');
    }
}
