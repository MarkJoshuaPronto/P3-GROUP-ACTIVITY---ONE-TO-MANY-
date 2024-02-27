<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return response()->json(['subjects' => $subjects]);
    }

    public function store(Request $request)
    {
        $subjects = Subject::create($request->all());
        return response()->json($subjects,201);
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::find($id);

        if (!$subject) {
            return response()->json(['error' => 'Subject not found'], 404);
        }

        $student = $subject->student;

        // Check if the student exists
        if (!$student) {
            return response()->json(['error' => 'Student not found'], 404);
        }

        $subject->update($request->all());

        return response()->json($subject,201);
    }

    public function destroy($id)
    {
        $subject = Subject::find($id);

        if ($subject) {
            $subject->delete();
            return response()->json(['message' => 'Successfully Deleted the Subject Data']);
        } else {
            return response()->json(['error' => 'Subject not found'], 404);
        }
    }
}
