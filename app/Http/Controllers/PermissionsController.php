<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\QueryBuilder\QueryBuilder;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $permissions = QueryBuilder::for(Permission::class)
            ->allowedFilters(['name'])
            ->paginate(20)
            ->appends($request->query());
        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sanitized = $request->validate([
            'name' => 'required',
        ]);

        Permission::create($sanitized);

        return redirect()->to('/permissions')->with('success', 'Permission Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        return view('permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $sanitized = $request->validate([
            'name' => 'required',
        ]);
        $permission->update($sanitized);
        return redirect()->to('/permissions')->with('success', 'Permissions Updated Successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->back()->with('success', 'Permission Deleted Successfully');
    }
}
