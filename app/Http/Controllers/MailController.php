<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\Contact;

class MailController extends Controller
{
    public function contact(Request $request) 
    {
        dd($request->name);
    }
}
