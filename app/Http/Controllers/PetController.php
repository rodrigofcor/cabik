<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Pet;
use App\Models\Specie;
use App\Models\PetPhoto;

class PetController extends Controller
{
    public function create()
    {  
        $species = Specie::all()->sortBy('name')->pluck('name', 'id');

        return view('pet.create', compact('species'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "pet_photo" => "required|array|min:2",
            "pet_photo.*" => "required|image|max:4096",
            'name' => 'nullable|min:3|max:20',
            'specie_id' => 'required',
            'breed_id' => 'required',
            'age_id' => 'required',
            'size_id' => 'required',
            'special' => 'required',
            'sex_id' => 'required',
            'castration_id' => 'required',
            'objective_id' => 'required',
            'description' => 'nullable|min:10|max:500',
        ]);

        $pet = new Pet();

        $pet->name = $request->name;
        $pet->breed_id = $request->breed_id;
        $pet->age_id = $request->age_id;
        $pet->size_id = $request->size_id;
        $pet->special = $request->special;
        $pet->sex_id = $request->sex_id;
        $pet->castration_id = $request->castration_id;
        $pet->objective_id = $request->objective_id;
        $pet->description = $request->description;
        $pet->user_id = Auth::user()->id;

        $pet->save();

        $cont = 0;
        foreach ($request->pet_photo as $photo)
        {
            $petPhoto = new PetPhoto();

            $petPhoto->order = $cont;
            $petPhoto->photo = $photo->store('pets');
            $petPhoto->pet_id = $pet->id;

            $petPhoto->save();

            ++$cont;
        }
        
        return redirect()->route('user.show', Auth::user());
    }
}
