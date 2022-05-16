<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function ddd()
    {
        return $this->belongsTo('App\Ddd');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
