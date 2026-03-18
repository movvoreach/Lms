<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'teacher_code',
        'course',
        'phone',
        'education',
        'experience',
        'skills',
        'profile_image',
        'note',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationship: Teacher belongs to User
    |--------------------------------------------------------------------------
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
