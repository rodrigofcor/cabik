<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function edit(Pet $pet)
    {  
        $species = Specie::all()->sortBy('name')->pluck('name', 'id');

        return view('pet.edit', compact('pet', 'species'));
    }

    public function update(Request $request, Pet $pet)
    {
        $request->validate([
            "pet_photo_0" => "required|image|max:4096",
            "pet_photo_1" => "required|image|max:4096",
            "pet_photo_2" => "nullable|image|max:4096",
            "pet_photo_3" => "nullable|image|max:4096",
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

        $pet->name = $request->name;
        $pet->breed_id = $request->breed_id;
        $pet->age_id = $request->age_id;
        $pet->size_id = $request->size_id;
        $pet->special = $request->special;
        $pet->sex_id = $request->sex_id;
        $pet->castration_id = $request->castration_id;
        $pet->objective_id = $request->objective_id;
        $pet->description = $request->description;

        $pet->save();

        if (isset($request->pet_photo_0))
        {
            if ($pet->photos->where('order', 0)->first())
            {
                Storage::delete($pet->photos->where('order', 0)->first()->photo);
                $pet->photos->where('order', 0)->first()->delete();
            }

            $petPhoto = new PetPhoto();

            $petPhoto->order = 0;
            $petPhoto->photo = $request->pet_photo_0->store('pets');
            $petPhoto->pet_id = $pet->id;

            $petPhoto->save();
        }

        if (isset($request->pet_photo_1))
        {
            if ($pet->photos->where('order', 1)->first())
            {
                Storage::delete($pet->photos->where('order', 1)->first()->photo);
                $pet->photos->where('order', 1)->first()->delete();
            }

            $petPhoto = new PetPhoto();

            $petPhoto->order = 1;
            $petPhoto->photo = $request->pet_photo_1->store('pets');
            $petPhoto->pet_id = $pet->id;

            $petPhoto->save();
        }

        if (isset($request->pet_photo_2))
        {
            if ($pet->photos->where('order', 2)->first())
            {
                Storage::delete($pet->photos->where('order', 2)->first()->photo);
                $pet->photos->where('order', 2)->first()->delete();
            }

            $petPhoto = new PetPhoto();

            $petPhoto->order = 2;
            $petPhoto->photo = $request->pet_photo_2->store('pets');
            $petPhoto->pet_id = $pet->id;

            $petPhoto->save();
        }
        
        if (isset($request->pet_photo_3))
        {
            if ($pet->photos->where('order', 3)->first())
            {
                Storage::delete($pet->photos->where('order', 3)->first()->photo);
                $pet->photos->where('order', 3)->first()->delete();
            }

            $petPhoto = new PetPhoto();

            $petPhoto->order = 3;
            $petPhoto->photo = $request->pet_photo_3->store('pets');
            $petPhoto->pet_id = $pet->id;

            $petPhoto->save();
        }

        return redirect()->route('user.show', Auth::user());
    }

    public function search()
    {  
        return view('pet.search');
    }
}
