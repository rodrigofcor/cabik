<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'name' => 'required|min:3|max:255',
            'id' => 'required|min:3|max:255|unique:users',
            'email' => 'required|min:3|max:255|email|unique:users',
            'phone' => 'min:9|max:10',
            'city_id' => 'required',
            'pix_type_id' => 'required_unless:pix,null',
            'pix' => 'required_unless:pix_type_id,null',
            'password' => 'required|min:6|max:255|confirmed',
        ],
        [
            'name.required' => 'You have to choose the file!',
            'type.required' => 'You have to choose type of the file!'
        ]);

        $user = new User();
    }
}
