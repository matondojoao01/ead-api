<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, UuidTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'name',
        'email',
        'password',
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
    ];

    /**
     * Get all of the supports for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function supports()
    {
        return $this->hasMany(Support::class);
    }

    public function replies()
    {
        return $this->hasMany(ReplySupport::class);
    }

    public function sendPasswordResetNotification($token)
    {
       $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Get all of the views for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function views()
    {
        return $this->hasMany(View::class);
    }
}
