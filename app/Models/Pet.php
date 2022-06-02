<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function age()
    {
        return $this->belongsTo('App\Models\Age');
    }

    public function breed()
    {
        return $this->belongsTo('App\Models\Breed');
    }

    public function specie()
    {
        return $this->hasOneThrough(Breed::class, Specie::class);
    }

    public function castration()
    {
        return $this->belongsTo('App\Models\Castration');
    }

    public function objective()
    {
        return $this->belongsTo('App\Models\Objective');
    }

    public function sex()
    {
        return $this->belongsTo('App\Models\Sex');
    }

    public function size()
    {
        return $this->belongsTo('App\Models\Size');
    }
}
