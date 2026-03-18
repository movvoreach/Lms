<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonContent extends Model
{
    use HasFactory;

    protected $table = 'lesson_contents';

    protected $fillable = [
        'course_id',
        'lesson_title',
        'unit_title',
        'unit_order',
        'content_type',
        'lesson_order',
        'description',
        'text_content',
        'video_url',
        'content_file_path',
        'content_file_name',
        'content_file_mime',
        'content_file_size',
        'thumbnail_path',
        'status',
    ];

    // ✅ This fixes: Call to undefined relationship [course]
    // public function course()
    // {
    //     return $this->belongsTo(Course::class, 'course_id', 'id');
    // }
    public function course()
{
    return $this->belongsTo(Course::class, 'course_id');
}
}
