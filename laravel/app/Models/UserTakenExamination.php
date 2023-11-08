<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserTakenExamination extends Model
{
    use HasFactory;

    protected $table = 'user_taken_examinations';

    protected $fillable = [
        'user_id',
        'examination_id',
        'question_group_id',
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

    public function examination(): BelongsTo
    {
        return $this->belongsTo(Examination::class,'examination_id','id');
    }

    public function question_groups(): BelongsTo
    {
        return $this->belongsTo(QuestionGroup::class,'question_group_id','id');
    }
}
