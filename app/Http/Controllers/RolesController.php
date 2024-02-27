<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\QueryBuilder\QueryBuilder;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $roles = QueryBuilder::for(Role::class)
            ->allowedFilters(['name'])
            ->paginate()
            ->appends($request->query());
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::pluck('name', 'id');
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sanitized = $request->validate([
            'name' => 'required',
            'permissions' => 'required | array',
        ]);

        $roles = Role::create($sanitized);
        $roles->permissions()->sync($sanitized['permissions']);
        return redirect()->to('/roles')->with('success', 'Roles Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $role->load(['permissions']);
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::pluck('name', 'id');
        $role->load(['permissions']);
        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $sanitized = $request->validate([
            'name' => 'required',
            'permissions' => 'required',
        ]);

        $role->update($sanitized);

        $role->permissions()->sync($sanitized['permissions']);

        return redirect()->to('/roles')->with('success', 'Role Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back()->with('success', 'Role Deleted Successfully');
    }
}
