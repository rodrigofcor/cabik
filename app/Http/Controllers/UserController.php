<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Ddd;
use App\Models\PixType;

class UserController extends Controller
{
    public function create()
    {   
        $ddds = Ddd::all()->sortBy('id')->pluck('name', 'id');
        $pixTypes = PixType::all()->sortBy('id')->pluck('name', 'id');

        return view('user.create', compact('ddds', 'pixTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image|max:4096',
            'name' => 'required|min:3|max:255',
            'id' => 'required|min:3|max:255|unique:users',
            'email' => 'required|min:3|max:255|email|unique:users',
            'phone' => 'nullable|min:9|max:10',
            'city_id' => 'required',
            'pix_type_id' => 'required_unless:pix,null',
            'pix' => 'required_unless:pix_type_id,null',
            'password' => 'required|min:8|max:255|confirmed',
        ]);

        $user = new User();
        
        $user->name = $request->name;
        $user->id = $request->id;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->city_id = $request->city_id;
        $user->pix_type_id = $request->pix_type_id;
        $user->pix = $request->pix;
        $user->password = Hash::make($request->password);
        $user->profile_photo = $request->profile_photo->store('users');

        $user->save();

        Auth::login($user);
        
        return redirect('/');
    }

    public function show(User $user){
        return view('user.show', compact('user'));
    }
}
