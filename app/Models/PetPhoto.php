<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetPhoto extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $appends = [
        'photo_src'
    ];

    public function getPhotoSrcAttribute()
    {
        return url('storage/' . $this->photo);
    }

    public function pet()
    {
        return $this->belongsTo('App\Models\Pet');
    }
}
