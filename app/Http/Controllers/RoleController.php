<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->get();
        return view('dashboard.admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('dashboard.admin.roles.create');
    }

    public function store(StoreRoleRequest $request)
    {
        Role::create($request->validated());
        return redirect()->route('dashboard.roles.index')->with('success', 'Role created successfully.');
    }

    public function edit(Role $role)
    {
        return view('dashboard.admin.roles.edit', compact('role'));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->validated());
        return redirect()->route('dashboard.roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('dashboard.roles.index')->with('success', 'Role deleted successfully.');
    }
}
