<?php

namespace App\Http\Requests;

use App\Models\Address;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddressUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'address_line_1' => ['required', 'string', 'max:255'],
            'address_line_2' => ['nullable', 'string', 'max:255'],
            'address_line_3' => ['nullable', 'string', 'max:255'],
            'street' => ['nullable', 'string', 'max:255'],
            'subdistrict' => ['required', 'string', 'max:255'],
            'district' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:10']
        ];
    }
}
