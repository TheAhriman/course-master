<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScaleCriteria extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "scale_criterias";

    protected $fillable = [
		'title',
		'text',
		'examination_id'
	];

    public function examination(): BelongsTo
    {
        return $this->belongsTo(Examination::class,'examination_id','id');
    }
}
