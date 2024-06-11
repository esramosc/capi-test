<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRequest;
use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function store(EmailRequest $request) {
        $email = Email::create($request->all());
        return response()->json($email);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'email' => 'required|email'
        ]);
        
        $email = Email::where('id', $id)
            ->update(
                [
                    'email' => $request->email
                ]
            );

        return response()->json($email);
    }

    public function destroy($id)
    {
        $email = Email::find($id);
        if (!$email) {
            return response('No se encontró el correo electrónico', 500);
        }
        $email->delete();
        return response()->json($email);
    }
}
