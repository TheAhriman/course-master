<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutCourse extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "about_courses";

    protected $fillable = [
		'value',
		'audience',
		'requirements'
	];

	public function courses(): HasMany
	{
		return $this->hasMany(Course::class,'about_course_id','id');
	}
}
