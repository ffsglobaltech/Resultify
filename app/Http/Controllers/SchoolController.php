<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;


class SchoolController extends Controller
{
    public function index()
    {
        return School::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_name' => 'required|string|max:50|unique:schools',
            'domain' => 'nullable|string|max:255',
            'logo_path' => 'nullable|string|max:255',
            'motto' => 'nullable|string|max:255',
            'address' => 'required|string',
            'subdomain' => 'required|string|max:255',
            'country' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'contact_email' => 'required|email',
            'contact_phone' => 'required|string|max:20',
        ]);

        $school = School::create($validated);

        return response()->json($school, 201);
    }
}
