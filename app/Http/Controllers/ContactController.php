<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ContactController extends Controller
{
    public function __construct(Request $request)
    {
        try {
            $user = User::whereToken($request->token)->first();
            
            if (!$user) {
                abort(401);
            }
            
            $this->user = $user;
        } catch (Exception $e) {
            abort(500);
        }
    }

    public function show()
    {
        $contacts = Contact::all();

        if (empty($contacts)) {
            return response()->json([
                'Warning' => 'no contacts found'
            ]);
        }

        return $contacts;
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
