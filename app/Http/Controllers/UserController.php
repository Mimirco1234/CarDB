<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function assignRole($user_id, $role_name)
    {
        $user = User::find($user_id);
        $role = Role::where('name', $role_name)->first();
        $user->role()->associate($role);
        $user->save();

        return redirect()->back()->with('success', 'Ruolo assegnato con successo');
    }
}
