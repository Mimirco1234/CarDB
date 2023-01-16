<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
    
        return view('roles.show',compact('role','rolePermissions'));
}
    public function store(Request $request, $user_id) {
        $request->validate([
        'Admin' => 'required',
        'User' => 'required',
        'user_id' => 'required'
    ]);      
        $role = new role;
        $role->user_id = Auth::user()->id;
        $role->save();      
        return redirect()->route('cars.show', $user_id)->with('success','role created successfully!');  
}

}
