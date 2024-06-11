<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Validate each email in emails array
        Validator::extend("emails", function($attribute, $value, $parameters) {
            $rules = [
                'email' => 'required|email',
            ];
            foreach ($value as $email) {
                $data = [
                    'email' => $email
                ];
                $validator = Validator::make($data, $rules);
                if ($validator->fails()) {
                    return false;
                }
            }
            return true;
        });

        // Validate each phone in phones array
        Validator::extend("phones", function($attribute, $value, $parameters) {
            $rules = [
                'phone' => 'required|string|max:255',
            ];
            foreach ($value as $email) {
                $data = [
                    'phone' => $email
                ];
                $validator = Validator::make($data, $rules);
                if ($validator->fails()) {
                    return false;
                }
            }
            return true;
        });

        // Validate each address in phones array
        Validator::extend("addresses", function($attribute, $value, $parameters) {
            $rules = [
                'state' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'address' => 'required|string|max:255',
            ];
            foreach ($value as $address) {
                $data = [
                    'state' => $address->state,
                    'city' => $address->city,
                    'address' => $address->address
                ];
                $validator = Validator::make($data, $rules);
                if ($validator->fails()) {
                    return false;
                }
            }
            return true;
        });

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'phones' => 'array',
            'emails' => 'array',
            'addresses' => 'array'
        ];
    }
}
