<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        return SchoolClass::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'school_id' => 'required|exists:schools,id',
            'class_name' => 'required',
        ]);

        $class = SchoolClass::create([
            'school_id' => $request->school_id,
            'class_name' => $request->class_name,
        ]);

        return response()->json($class, 201);
    }

    public function show($id)
    {
        return SchoolClass::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $class = SchoolClass::findOrFail($id);

        $request->validate([
            'school_id' => 'required|exists:schools,id',
            'class_name' => 'required',
        ]);

        $class->update([
            'school_id' => $request->school_id,
            'class_name' => $request->class_name,
        ]);

        return response()->json($class);
    }

    public function destroy($id)
    {
        SchoolClass::destroy($id);

        return response()->json(null, 204);
    }
}
