<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::orderBy('groupby')->get();
        return view('dashboard.admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('dashboard.admin.permissions.create');
    }

    public function store(StorePermissionRequest $request)
    {
        Permission::create($request->validated());
        return redirect()->route('dashboard.permissions.index')->with('success', 'Permission created successfully.');
    }

    public function edit(Permission $permission)
    {
        return view('dashboard.admin.permissions.edit', compact('permission'));
    }

    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update($request->validated());
        return redirect()->route('dashboard.permissions.index')->with('success', 'Permission updated successfully.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('dashboard.permissions.index')->with('success', 'Permission deleted successfully.');
    }
}
