<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function address(AddressRequest $request) {
        $address = Address::create($request->all());
        return response()->json($address);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255'
        ]);
        
        $address = Address::where('id', $id)
            ->update(
                [
                    'state' => $request->state,
                    'city' => $request->city,
                    'address' => $request->address
                ]
            );

        return response()->json($address);
    }

    public function destroy($id)
    {
        $address = Address::find($id);
        if (!$address) {
            return response('No se encontró la dirección', 500);
        }
        $address->delete();
        return response()->json($address);
    }
}
