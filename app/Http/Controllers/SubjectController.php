<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        return Subject::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'school_id' => 'required|exists:schools,id',
            'subject_name' => 'required',
            'class_id' => 'required|exists:school_classes,id',
        ]);

        $subject = Subject::create([
            'school_id' => $request->school_id,
            'subject_name' => $request->subject_name,
            'class_id' => $request->class_id,
        ]);

        return response()->json($subject, 201);
    }

    public function show($id)
    {
        return Subject::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);

        $request->validate([
            'school_id' => 'required|exists:schools,id',
            'subject_name' => 'required',
            'class_id' => 'required|exists:school_classes,id',
        ]);

        $subject->update([
            'school_id' => $request->school_id,
            'subject_name' => $request->subject_name,
            'class_id' => $request->class_id,
        ]);

        return response()->json($subject);
    }

    public function destroy($id)
    {
        Subject::destroy($id);

        return response()->json(null, 204);
    }
}
