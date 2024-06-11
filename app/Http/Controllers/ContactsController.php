<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Address;
use App\Models\Contact;
use App\Models\Email;
use App\Models\Phone;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Return contacts list with pagination
     */
    public function index()
    {
        $contacts = Contact::orderBy('id', 'desc')->paginate();
        return response()->json($contacts);
    }

    public function store(ContactRequest $request)
    {
        $contact = Contact::create(
            [
                'name' => $request->name
            ]
        );
        // return response()->json($request->all());
        if (!$contact) {
            return response('No se pudo crear el contacto', 500);
        }

        if (isset($request->phones)) {
            $phones = $request->phones;
            foreach ($phones as $key => $phone) {
                Phone::create(
                    [
                        'phone' => $phone['phone'],
                        'contact_id' => $contact->id
                    ]
                );
            }
        }

        if (isset($request->emails)) {
            $emails = $request->emails;
            foreach ($emails as $key => $email) {
                Email::create(
                    [
                        'email' => $email['email'],
                        'contact_id' => $contact->id
                    ]
                );
            }
        }

        if (isset($request->addresses)) {
            $addresses = $request->addresses;
            foreach ($addresses as $key => $address) {
                Address::create(
                    [
                        'state' => $address['state'],
                        'city' => $address['city'],
                        'address' => $address['address'],
                        'contact_id' => $contact->id
                    ]
                );
            }
        }

        return response()->json($contact);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $contact = Contact::where('id', $id)
            ->update(
                [
                    'name' => $request->name
                ]
            );

        if (isset($request->phones)) {
            $phones = $request->phones;
            foreach ($phones as $key => $phone) {
                Phone::create(
                    [
                        'phone' => $phone['phone'],
                        'contact_id' => $contact->id
                    ]
                );
            }
        }

        if (isset($request->emails)) {
            $emails = $request->emails;
            foreach ($emails as $key => $email) {
                Email::create(
                    [
                        'email' => $email['email'],
                        'contact_id' => $contact->id
                    ]
                );
            }
        }

        if (isset($request->addresses)) {
            $addresses = $request->addresses;
            foreach ($addresses as $key => $address) {
                Address::create(
                    [
                        'state' => $address['state'],
                        'city' => $address['city'],
                        'address' => $address['address'],
                        'contact_id' => $contact->id
                    ]
                );
            }
        }

        return response()->json($contact);
    }

    public function show($id) {
        $contact = Contact::with(['phones', 'emails', 'addresses'])
            ->where('id', $id)
            ->first();
        return response()->json($contact);
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            return response('No se encontró el contacto', 500);
        }
        $contact->phones()->delete();
        $contact->emails()->delete();
        $contact->addresses()->delete();
        $contact->delete();
        return response()->json($contact);
    }
}
