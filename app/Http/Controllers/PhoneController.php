<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneRequest;
use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function store(PhoneRequest $request) {
        $phone = Phone::create($request->all());
        return response()->json($phone);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'phone' => 'required|string|max:255'
        ]);
        
        $phone = Phone::where('id', $id)
            ->update(
                [
                    'phone' => $request->phone
                ]
            );

        return response()->json($phone);
    }

    public function destroy($id)
    {
        $phone = Phone::find($id);
        if (!$phone) {
            return response('No se encontró el teléfono', 500);
        }
        $phone->delete();
        return response()->json($phone);
    }
}
