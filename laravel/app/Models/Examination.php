<?php

namespace App\Models;

use App\Enums\ExaminationTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Examination extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "examinations";

    protected $casts = [
        'type' => ExaminationTypeEnum::class
    ];

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class,'lesson_id','id');
    }

    public function question_groups(): HasMany
    {
        return $this->hasMany(QuestionGroup::class,'examination_id','id');
    }

    public function scale_criterias(): HasMany
    {
        return $this->hasMany(ScaleCriteria::class,'examination_id','id');
    }
}
