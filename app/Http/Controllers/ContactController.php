<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ContactController extends Controller
{
    public function __construct()
    {
        // to do: autenticate token
    }

    public function show()
    {
        return Contact::all();
    }

    public function store(Request $request)
    {
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->mail = $request->mail;
        $contact->address = $request->address;
        $contact->phone = $request->phone;
        $contact->token = Hash::make(str_random(10));
        $contact->save();

        return $contact;
    }
}
