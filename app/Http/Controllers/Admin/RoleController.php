<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->withCount('users')->get(); // users_count works if relation exists
    $permissions = Permission::all();

    // If Role model doesn't have users relation, use User count (assigned users)
    $usersAssigned = User::whereHas('roles')->count();

    return view('admin.roles.index', compact('roles','permissions','usersAssigned'));
    }

    public function create()
{
    $permissions = Permission::all();

    $permissionCategories = $permissions->groupBy(function ($permission) {
        return $permission->category ?? 'General';
    });

    return view('admin.roles.create', compact('permissionCategories'));
}

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name',
            'permissions' => 'nullable|array',
            'permissions.*' => 'string',
        ]);

        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permissions ?? []);

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role created successfully');
    }

   public function edit(Role $role)
{
    $permissions = Permission::all();
    $rolePermissions = $role->permissions->pluck('name')->toArray();

    return view('admin.roles.edit',
        compact('role','permissions','rolePermissions')
    );
}

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name,' . $role->id,
            'permissions' => 'nullable|array',
            'permissions.*' => 'string',
        ]);

        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permissions ?? []);

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role updated successfully');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('success', 'Role deleted successfully');
    }
}
