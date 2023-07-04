<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles', 'permissions')->get();
        return view('users.index', compact('users'));
    }

    //
    public function create()
    {
        $roles = Role::pluck('name', 'id');

        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|exists:roles,id',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $role = Role::find($request->role);
        $user->assignRole($role);

        session()->flash('status', 'User has been successfully added into database.');

        return to_route('users.index');
    }

    public function edit(User $user, Request $request)
    {
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $user->update($request->all());

        // Remove existing role permissions
        $permissionsToRemove = Permission::whereIn('id', $user->permissions->pluck('id'))
            ->whereIn('id', $request->input('permissions', []))
            ->get();

        $user->revokePermissionTo($permissionsToRemove);

        // Assign new role permissions
        $user->syncPermissions($request->input('permissions', []));

//        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        return to_route('users.index', compact('user'));
    }
}
