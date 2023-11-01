<?php

namespace App\Models;

use App\Enums\LessonContentMediaTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class LessonContent extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "lesson_contents";

    protected $fillable = [
		'media_type',
		'value',
		'description',
		'lesson_id'
	];

    protected $casts = [
        'media_type' => LessonContentMediaTypeEnum::class
    ];

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class,'lesson_id','id');
    }
}
