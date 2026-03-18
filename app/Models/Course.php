<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
    'category_id',
    'title',
    'code',
    'thumbnail',
    'description',
    'duration_hours',
    'fee',
    'start_date',
    'end_date',
    'is_active',

];

    /*
    |--------------------------------------------------------------------------
    | Relationship
    |--------------------------------------------------------------------------
    */

    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'category_id');
    }
    public function subjects()
{
    return $this->hasMany(Subject::class);
}
}
