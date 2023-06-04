<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\Contact;
use App\Models\Pet;

class MailController extends Controller
{
    public function contactMail(Request $request)
    {
        // $pet = Pet::find($request->pet_id);
        // Mail::to($pet->user->email)->send(new Contact(
        //     $request->email,
        //     $request->phone,
        //     $pet->title,
        //     $request->name,
        //     $pet->user->name
        // ));
    }
}
