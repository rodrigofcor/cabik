<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function breeds()
    {
        return $this->hasMany('App\Models\Breed');
    }

    public function pets()
    {
        return $this->hasManyThrough(Breed::class, Pet::class);
    }
}
