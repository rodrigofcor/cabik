<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Ddd;

class UserController extends Controller
{
    public function create()
    {
        $ddds = Ddd::all()->sortBy('id');

        return view('user.create', compact('ddds'));
    }
}
