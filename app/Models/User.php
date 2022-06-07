<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $incrementing = false;

    protected $appends = [
        'login',
        'full_phone',
        'full_pix',
        'localization',
        'avatar_src',
    ];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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

    public function getLoginAttribute()
    {
        return '@' . $this->id;
    }

    public function getFullPhoneAttribute()
    {
        if($this->phone) {
            return '(' . $this->city->ddd->id . ') ' . $this->phone;
        } else {
            return null;
        }
    }

    public function getFullPixAttribute()
    {
        if($this->pix) {
            return '(' . $this->pixType->name . ') ' . $this->pix;
        } else {
            return null;
        }
    }

    public function getLocalizationAttribute()
    {
        if($this->city) {
            return $this->city->name . '/' . substr($this->city->ddd->name, -2);
        } else {
            return null;
        }
    }

    public function getAvatarSrcAttribute()
    {
        return url('storage/' . $this->profile_photo);
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function pixType()
    {
        return $this->belongsTo('App\Models\PixType');
    }

    public function pets()
    {
        return $this->hasMany('App\Models\Pet');
    }
}
