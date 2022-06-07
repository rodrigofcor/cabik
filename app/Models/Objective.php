<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;

    public function pets()
    {
        return $this->hasMany('App\Models\Pet');
    }
}
