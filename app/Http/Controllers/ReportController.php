<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function contactsByFilter(Request $request)
    {
        $filters = $request->all(); // Get all filters from the request

        $query = Contact::query();

        if (isset($filters['name'])) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
        }

        if (isset($filters['state'])) {
            $query->whereHas('addresses', function ($query) use ($filters) {
                $query->where('state', $filters['state']);
            });
        }

        if (isset($filters['city'])) {
            $query->whereHas('addresses', function ($query) use ($filters) {
                $query->where('city', $filters['city']);
            });
        }

        if (isset($filters['phone'])) {
            $query->whereHas('phones', function ($query) use ($filters) {
                $query->where('phone', $filters['phone']);
            });
        }

        if (isset($filters['with'])) {
            $query->with($filters['with']);
        }

        $contacts = $query->paginate(10); // Adjust page size as needed

        return response()->json($contacts);
    }
}
