<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinishedCourse extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'finished_courses';

    protected $fillable = [
        'user_id',
        'course_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class,'course_id','id');
    }
}
