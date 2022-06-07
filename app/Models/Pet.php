<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $appends = [
        'specie',
        'title',
        'main_photo_src',
        'special_status',
    ];

    public function getSpecieAttribute()
    {
        return $this->breed->specie;
    }

    public function getTitleAttribute()
    {
        return $this->specie->name . ' ' . $this->breed->name . ' ' . $this->sex->name . ' ' . $this->age->name;
    }

    public function getMainPhotoSrcAttribute()
    {
        return url('storage/' . $this->photos->where('order', 0)->first()->photo);
    }

    public function getSpecialStatusAttribute()
    {
        return $this->special == 1 ? 'Necessita' : 'Não necessita';
    }

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

    public function photos()
    {
        return $this->hasMany('App\Models\PetPhoto');
    }
}
