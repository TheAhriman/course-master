<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "courses";

    protected $guarded = false;

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class,'course_id','id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,'category_courses',
            'course_id','category_id');
    }

    public function about_course(): BelongsTo
    {
        return $this->belongsTo(AboutCourse::class,'about_course_id','id');
    }
}
