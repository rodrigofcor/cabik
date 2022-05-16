<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ddd extends Model
{
    use HasFactory;

    public function cities()
    {
        return $this->hasMany('App\City');
    }
}
