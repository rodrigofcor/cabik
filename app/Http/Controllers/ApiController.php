<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\City;

class ApiController extends Controller
{
    public function getCitiesOfDdd($id)
    {
        return City::where('ddd_id', $id)->get()->sortBy('name');
    }
}