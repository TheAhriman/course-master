<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionResponse extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "question_responses";

    protected $fillable = [
		'answer',
		'correct',
		'enabled',
		'question_id'
	];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class,'question_id','id');
    }

    public function user_answers(): HasMany
    {
        return $this->hasMany(UserAnswer::class,'question_response_id','id');
    }
}
