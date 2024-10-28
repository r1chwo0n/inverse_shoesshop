<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function create()
    {
        return view('addresses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'address_line_1' => 'required|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'address_line_3' => 'nullable|string|max:255',
            'street' => 'nullable|string|max:255',
            'subdistrict' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
        ]);

        $address = new Address($request->all());
        $address->user_id = Auth::id();
        $address->save();

        return redirect()->route('profile.show')->with('status', 'Address added successfully');
    }

    public function edit(Address $address)
    {
        $this->authorize('update', $address);
        return view('addresses.edit', compact('address'));
    }

    public function update(Request $request, Address $address)
    {
        $this->authorize('update', $address);

        $request->validate([
            'address_line_1' => 'required|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'address_line_3' => 'nullable|string|max:255',
            'street' => 'nullable|string|max:255',
            'subdistrict' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
        ]);

        $address->update($request->all());

        return redirect()->route('profile.show')->with('status', 'Address updated successfully');
    }

    public function destroy(Address $address)
    {
        $this->authorize('delete', $address);
        $address->delete();

        return redirect()->route('profile.show')->with('status', 'Address deleted successfully');
    }
}
