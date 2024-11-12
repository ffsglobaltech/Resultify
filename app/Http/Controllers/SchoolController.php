<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        return School::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'short_name' => 'required|unique:schools',
            'domain' => 'nullable|unique:schools',
            'address' => 'nullable',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'contact_email' => 'required|email',
            'contact_phone' => 'required',
        ]);

        $school = School::create([
            'name' => $request->name,
            'short_name' => $request->short_name,
            'domain' => $request->domain,
            'address' => $request->address,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'contact_email' => $request->contact_email,
            'contact_phone' => $request->contact_phone,
        ]);

        return response()->json($school, 201);
    }

    public function show($id)
    {
        return School::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $school = School::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'short_name' => 'required|unique:schools,short_name,' . $school->id,
            'domain' => 'nullable|unique:schools,domain,' . $school->id,
        ]);

        $school->update([
            'name' => $request->name,
            'short_name' => $request->short_name,
            'domain' => $request->domain,
            'address' => $request->address,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'contact_email' => $request->contact_email,
            'contact_phone' => $request->contact_phone,
        ]);

        return response()->json($school);
    }

    public function destroy($id)
    {
        School::destroy($id);

        return response()->json(null, 204);
    }
}
