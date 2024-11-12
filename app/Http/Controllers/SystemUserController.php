<?php

namespace App\Http\Controllers;

use App\Models\SystemUser;
use Illuminate\Http\Request;

class SystemUserController extends Controller
{
    public function index()
    {
        return SystemUser::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:system_users',
            'email' => 'required|email|unique:system_users',
            'password' => 'required|min:6',
            'role' => 'required|in:super_admin,system_admin',
        ]);

        $user = SystemUser::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return response()->json($user, 201);
    }

    public function show($id)
    {
        return SystemUser::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $user = SystemUser::findOrFail($id);

        $request->validate([
            'username' => 'required|unique:system_users,username,' . $user->id,
            'email' => 'required|email|unique:system_users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'role' => 'required|in:super_admin,system_admin',
        ]);

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'role' => $request->role,
        ]);

        return response()->json($user);
    }

    public function destroy($id)
    {
        SystemUser::destroy($id);

        return response()->json(null, 204);
    }
}
