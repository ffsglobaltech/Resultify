<?php

namespace App\Http\Controllers;

use App\Models\SchoolUser;
use Illuminate\Http\Request;

class SchoolUserController extends Controller
{
    public function index()
    {
        return SchoolUser::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'school_id' => 'required|exists:schools,id',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:school_users',
            'password' => 'required|min:6',
            'role' => 'required|in:principal,vice_principal,teacher,parent',
        ]);

        $user = SchoolUser::create([
            'school_id' => $request->school_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
        ]);

        return response()->json($user, 201);
    }

    public function show($id)
    {
        return SchoolUser::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $user = SchoolUser::findOrFail($id);

        $request->validate([
            'school_id' => 'required|exists:schools,id',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:school_users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'role' => 'required|in:principal,vice_principal,teacher,parent',
        ]);

        $user->update([
            'school_id' => $request->school_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'role' => $request->role,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
        ]);

        return response()->json($user);
    }

    public function destroy($id)
    {
        SchoolUser::destroy($id);

        return response()->json(null, 204);
    }
}
