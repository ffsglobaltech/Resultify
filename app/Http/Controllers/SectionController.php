<?php

namespace App\Http\Controllers;

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
            'section_name' => 'required|string|max:255',
        ]);

        $section = Section::create($request->all());
        return response()->json($section, 201);
    }

    public function show($id)
    {
        return Section::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $section = Section::findOrFail($id);
        $section->update($request->all());
        return response()->json($section, 200);
    }

    public function destroy($id)
    {
        Section::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
