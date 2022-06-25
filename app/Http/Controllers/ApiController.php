<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\City;
use App\Models\Breed;
use App\Models\Pet;

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

    public function searchPets(Request $request)
    {
        $conditions = 'pets.user_id IS NOT NULL';

        $conditions .= $request->ddd_id != 'all' ? ' AND cities.ddd_id = "' . $request->ddd_id . '"' : '';
        $conditions .= $request->specie_id != 'all' ? ' AND breeds.specie_id = ' . $request->specie_id : '';
        $conditions .= $request->sex_id != 'all' ? ' AND pets.sex_id = "' . $request->sex_id . '"' : '';
        $conditions .= $request->objective_id != 'all' ? ' AND pets.objective_id = "' . $request->objective_id . '"' : '';
        $conditions .= $request->city_id != 'all' ? ' AND users.city_id = ' . $request->city_id : '';
        $conditions .= $request->breed_id != 'all' ? ' AND pets.breed_id = ' . $request->breed_id : '';
        $conditions .= $request->age_id != 'all' ? ' AND pets.age_id = "' . $request->age_id . '"' : '';
        $conditions .= $request->size_id != 'all' ? ' AND pets.size_id = "' . $request->size_id . '"' : '';
        $conditions .= $request->special != 'all' ? ' AND pets.special = ' . $request->special : '';
        $conditions .= $request->castration_id != 'all' ? ' AND pets.castration_id = "' . $request->castration_id . '"' : '';

        $pets = Pet::leftJoin('users', 'users.id', '=', 'pets.user_id')
                    ->leftJoin('cities', 'cities.id', '=', 'users.city_id')
                    ->leftJoin('breeds', 'breeds.id', '=', 'pets.breed_id')
                    ->whereRaw($conditions)
                    ->orderBy('pets.created_at')
                    ->select('pets.*')
                    ->paginate(10);

        $data = [];

        foreach ($pets as $pet) 
        {
            $a = [
                'title' => $pet->title,
                'name' => $pet->name,
                'specie' => $pet->specie->name,
                'breed' => $pet->breed->name,
                'sex' => $pet->sex->name,
                'age' => $pet->age->name,
                'size' => $pet->size->name,
                'special' => $pet->specialStatus,
                'castration' => $pet->castration->name,
                'objective' => $pet->objective->name,
                'localization' => $pet->localization,
                'description' => nl2br($pet->description),
                'srcs' => $pet->allPhotosSrc, 
                'photo' => $pet->mainPhotoSrc,
                'tutorPhoto' => $pet->user->avatar_src,
                'tutor' => $pet->user->name ,
                'id' => $pet->id,
            ];

            array_push($data, $a);
        }

        $pets = $pets->toArray();
        $pets['data'] = $data;

        return $pets;
    }
}
