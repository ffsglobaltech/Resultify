<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        return Section::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'school_id' => 'required|exists:schools,id',
            'section_name' => 'required',
        ]);

        $section = Section::create([
            'school_id' => $request->school_id,
            'section_name' => $request->section_name,
        ]);

        return response()->json($section, 201);
    }

    public function show($id)
    {
        return Section::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $section = Section::findOrFail($id);

        $request->validate([
            'school_id' => 'required|exists:schools,id',
            'section_name' => 'required',
        ]);

        $section->update([
            'school_id' => $request->school_id,
            'section_name' => $request->section_name,
        ]);

        return response()->json($section);
    }

    public function destroy($id)
    {
        Section::destroy($id);

        return response()->json(null, 204);
    }
}
