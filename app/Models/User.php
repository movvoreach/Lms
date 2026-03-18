<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, HasRoles, Notifiable;

    protected $fillable = [
        'teacher_id',
        'name',
        'email',
        'password',
        'phone',
        'education',
        'experience',
        'skills',
        'avatar',
        'note',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

   public function student()
{
    return $this->hasOne(\App\Models\Student::class);
}

    /*
    |--------------------------------------------------------------------------
    | Helper: Check if user is teacher
    |--------------------------------------------------------------------------
    */
    public function isTeacher()
    {
        return $this->hasRole('teacher');
    }

    /*
    |--------------------------------------------------------------------------
    | Scope: Only teachers
    |--------------------------------------------------------------------------
    */
    public function scopeTeachers($query)
    {
        return $query->role('teacher');
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }

    public function getAvatarAttribute()
    {
        if ($this->teacher?->profile_image) {
            return asset('storage/'.$this->teacher->profile_image);
        }

        return asset('backend/dist/img/user1-128x128.jpg');
    }
}
