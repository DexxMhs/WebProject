<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\PermissionRoleModel;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $this->authorize('viewAny', [Role::class, 'view_roles']);
        $data['getRecord'] = Role::getRecord();
        return view('dashboard.admin.permission-roles.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $this->authorize('create', [Role::class, 'create_roles']);
        $getPermission = Permission::getRecord();
        $data['getPermission'] = $getPermission;
        return view('dashboard.admin.permission-roles.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save = new Role;
        $save->name = $request->name;
        $save->save();

        PermissionRoleModel::insertUpdateRecord($request->permission_id, $save->id);

        return redirect('dashboard.permission-roles.index')->with('success', "Role successfully created");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $this->authorize('view', Role::class);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $this->authorize('update', [Role::class, 'edit_roles']);
        $data['getRecord'] = Role::getSingle($id);
        $data['getPermission'] = Permission::getRecord();
        $data['getRolePermission'] = PermissionRoleModel::getRolePermission($id);
        return view('dashboard.admin.permission-roles.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $save = Role::getSingle($id);
        $save->name = $request->name;
        $save->save();

        PermissionRoleModel::insertUpdateRecord($request->permission_id, $save->id);

        return redirect('dashboard.permission-roles.index')->with('success', "Role successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
