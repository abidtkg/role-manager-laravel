<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->latest()->get();;
        return view('admin.role', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.createrole', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'permissions' => 'required|array'
        ]);

        $permissions = [];
        foreach($request->permissions as $permission){
            array_push($permissions, intval($permission));
        }

        $role = Role::create(['name' => $request->name, 'guard_name' => 'web']);
        
        $role->syncPermissions($permissions);
        return back()->with('success', 'role created');
    }

    public function edit($id)
    {
        $permissions = Permission::all();
        $role = Role::with('permissions')->find($id);
        $active_permissions = $role->permissions()->pluck('id')->toArray();
        return view('admin.roleeidt', compact('role', 'permissions', 'active_permissions'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        
        $role = Role::find($request->id);
        $role->update(['name' => $request->name]);

        $permissions = [];
        foreach($request->permissions as $permission){
            array_push($permissions, intval($permission));
        }

        $role->syncPermissions($permissions);
        return back()->with('success', 'Role and permission updated');
    }
}
