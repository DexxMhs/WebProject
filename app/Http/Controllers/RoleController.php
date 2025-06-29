<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\PermissionRoleModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('view_roles');
        $roles = Role::latest()->get();
        return view('dashboard.admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $this->authorize('create_roles');
        $getPermission = Permission::getRecord();
        $data['getPermission'] = $getPermission;
        return view('dashboard.admin.roles.create', $data);
    }

    public function store(Request $request)
    {
        $save = new Role;
        $save->name = $request->name;
        $save->save();

        PermissionRoleModel::insertUpdateRecord($request->permission_id, $save->id);

        return redirect()->route('dashboard.roles.index')->with('success', 'Role created successfully.');
    }

    public function edit(string $id)
    {
        $this->authorize('edit_roles');
        $data['getRecord'] = Role::getSingle($id);
        $data['getPermission'] = Permission::getRecord();
        $data['getRolePermission'] = PermissionRoleModel::getRolePermission($id);
        return view('dashboard.admin.roles.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $save = Role::getSingle($id);
        $save->name = $request->name;
        $save->save();

        PermissionRoleModel::insertUpdateRecord($request->permission_id, $save->id);
        return redirect()->route('dashboard.roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        $this->authorize('delete_roles');
        // Hapus data permission_role yang terkait
        \App\Models\PermissionRoleModel::where('role_id', $role->id)->delete();

        $role->delete();
        return redirect()->route('dashboard.roles.index')->with('success', 'Role deleted successfully.');
    }
}
