<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories';

    public function posts()
    {
        return $this->hasMany(Post::class,'category_id','id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class,'id','parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class,'parent_id','id');
    }
}
