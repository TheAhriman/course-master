<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Permission extends Model
{
    use HasFactory;

    protected $table = "permissions";
    protected $guarded = false;

    public function role() : HasOne
    {
        return $this->hasOne(Role::class,'id','role_id');
    }
}
