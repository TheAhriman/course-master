<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserTakenCourse extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_taken_courses';

    protected $fillable = [
        'user_id',
        'course_id',
        'lesson_id',
        'status',
        'started_at',
        'finished_at'
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'finished_at' => 'datetime'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class,'course_id','id');
    }

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class,'lesson_id','id');
    }
}
