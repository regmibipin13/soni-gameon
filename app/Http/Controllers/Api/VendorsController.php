<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Vendors\StoreVendorRequest;
use App\Http\Requests\Api\Vendors\UpdateVendorRequest;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => Vendor::paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVendorRequest $request)
    {
        $vendor = Vendor::create($request->all());

        if ($vendor) {
            $vendor->user->token = $vendor->user->createToken('API Token')->accessToken;
            $vendor
                ->addMedia($request->image)
                ->toMediaCollection();

            return response()->json(['status' => 'success', 'message' => 'Vendor Registered Successfully', 'data' => $vendor]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Registration Failed']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor)
    {
        return response()->json(['data' => $vendor->load(['user'])]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVendorRequest $request, Vendor $vendor)
    {
        $vendor->update($request->all());
        if ($request->image !== null) {
            $vendor->clearMediaCollection();
            $vendor->addMedia($request->filepond)->toMediaCollection();
        }

        return response()->json(['data' => 'Vendor Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
        return response()->json(['status' => 'success', 'message' => 'Vendor Deleted Successfully']);
    }

    public function validateVendor(Request $request)
    {
        $sanitized = $request->validate([
            'user_name' => ['required'],
            'email' => ['required', 'unique:users'],
            'phone' => ['required', 'unique:users'],
            'password' => ['required'],
        ]);

        return response()->json([
            'status' => 'validated'
        ]);
    }
}