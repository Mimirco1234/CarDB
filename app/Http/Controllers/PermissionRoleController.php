<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionRoleController extends Controller
{
    public function store(Request $request, $role_id, $permission_id) {
        $request->validate([
            'role_id' => 'required',
            'permission_id' => 'required'
        ]);
        $role = Role::find($request->role_id);
        $role->permissions()->attach($request->permission_id);
        return redirect()->route('cars.show')->with('success','role added to car successfully!');  
    }
    public function assignPermissionToAdmin() {
        $adminRole = Role::where('name', 'Admin')->first();
        $createPermission = Permission::where('name', 'create')->first();
        $editPermission = Permission::where('name', 'edit')->first();
        $deletePermission = Permission::where('name', 'delete')->first();
        $adminRole->attachPermissions([$createPermission, $editPermission, $deletePermission]);
        return redirect()->back()->with('success', 'Permissions assigned to Admin role successfully!');
    }
}