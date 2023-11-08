<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "lessons";

    protected $fillable = [
		'title',
		'slug',
		'description',
		'course_id',
		'priority'
	];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class,'lesson_id','id');
    }

    public function lesson_contents(): HasMany
    {
        return $this->hasMany(LessonContent::class,'lesson_id','id');
    }

    public function examinations(): HasMany
    {
        return $this->hasMany(Examination::class,'lesson_id','id');
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class,'course_id','id');
    }

    public function user_progresses(): HasMany
    {
        return $this->hasMany(UserProgress::class,'lesson_id','id');
    }

    public function taken_courses(): HasMany
    {
        return $this->hasMany(UserTakenCourse::class,'lesson_id','id');
    }
}
