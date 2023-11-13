<?php

namespace App\Models;

use App\Enums\QuestionTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = "questions";

	protected $fillable = [
		'question',
		'type',
		'priority',
		'required',
		'question_group_id',
        'score'
	];

    protected $casts = [
        'type' => QuestionTypeEnum::class
    ];

    public function question_group(): BelongsTo
    {
        return $this->belongsTo(QuestionGroup::class,'question_group_id','id');
    }

    public function question_response(): HasMany
    {
        return $this->hasMany(QuestionResponse::class,'question_id','id');
    }

    public function user_answers(): HasMany
    {
        return $this->hasMany(UserAnswer::class,'question_id','id');
    }
}
