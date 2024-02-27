<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vendors\StoreVendorRequest;
use App\Http\Requests\Vendors\UpdateVendorRequest;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class VendorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $vendors = QueryBuilder::for(Vendor::class)
            ->defaultSort('-id')
            ->allowedFilters(['name', 'tax_number', 'city'])
            ->paginate(20)

            ->appends($request->query());
        return view('vendors.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVendorRequest $request)
    {
        $vendor = Vendor::create($request->all());
        $vendor
            ->addMedia($request->filepond)
            ->toMediaCollection();
        return redirect()->to('/vendors')->with('success', 'Vendor Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor)
    {
        $vendor->load('user');
        return view('vendors.show', compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendor $vendor)
    {
        $vendor->load('user');
        return view('vendors.edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVendorRequest $request, Vendor $vendor)
    {
        $vendor->update($request->all());
        if ($request->filepond !== null) {
            $vendor->clearMediaCollection();
            $vendor->addMedia($request->filepond)->toMediaCollection();
        }
        return redirect()->to('/vendors')->with('success', 'Vendors Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
        return redirect()->to('/vendors')->with('success', 'Vendor Deleted Successfully');
    }
}
