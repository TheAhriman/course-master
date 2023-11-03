<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserExaminationsProgress extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_examinations_progress';

    protected $fillable = [
        'user_id',
        'examination_id',
        'question_group_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function examination(): BelongsTo
    {
        return $this->belongsTo(Examination::class,'examination_id','id');
    }

    public function question_group(): BelongsTo
    {
        return $this->belongsTo(QuestionGroup::class,'question_group_id','id');
    }
}
