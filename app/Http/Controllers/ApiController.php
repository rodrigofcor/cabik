<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\City;
use App\Models\Breed;

class ApiController extends Controller
{
    public function getCitiesOfDdd($id)
    {
        return City::where('ddd_id', $id)->orderBy('name')->get();
    }

    public function getBreedsOfSpecie($id)
    {
        return Breed::where('specie_id', $id)->orderBy('name')->get();
    }
}
