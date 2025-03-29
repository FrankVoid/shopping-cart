<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $address = Address::all();
        return response()->json($address,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAddressRequest $request)
    {
        $address = Address::create($request->validated());
        return response()->json($address,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        return response()->json($address,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAddressRequest $request, Address $address)
    {
        $address = Address::update($request->validated());
        return response()->json($address,201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return response()->json('Address Removed',200);
    }
}
