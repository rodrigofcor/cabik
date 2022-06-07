<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Castration extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;

    public function pets()
    {
        return $this->hasMany('App\Models\Pet');
    }
}
