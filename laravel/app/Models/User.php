<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'email_verified_at',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $table = 'users';

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'user_id', 'id');
    }

    public function user_answers(): HasMany
    {
        return $this->HasMany(UserAnswer::class, 'user_id', 'id');
    }

    public function taken_courses()
    {
        return $this->hasMany(UserTakenCourse::class, 'user_id', 'id');
    }

    public function user_examinations()
    {
        return $this->hasMany(UserTakenExamination::class, 'user_id', 'id');
    }

    public function user_lessons(): HasMany
    {
        return $this->hasMany(UserLesson::class, 'user_id', 'id');
    }

    public function chatMessage(): HasMany
    {
        return $this->hasMany(ChatMessage::class, 'user_id', 'id');
    }

    public function favouriteCourses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class,'favourite_courses');
    }
}
