<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAnswer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "user_answers";

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class,'question_id','id');
    }

    public function question_response(): BelongsTo
    {
        return $this->belongsTo(QuestionResponse::class,'question_response_id','id');
    }
}
