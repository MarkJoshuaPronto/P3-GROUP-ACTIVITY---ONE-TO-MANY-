<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return Student::with('subject')->get();
    }

    public function store(Request $request)
    {
        $student = Student::create($request->all());
        if ($request->has('subjects')) {
            $student->subject()->createMany($request->input('subjects'));
        }
        return response()->json(['message' => 'Successfully Created Data']);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->update($request->all());
        return response()->json(['message' => 'Successfully Updated Data']);
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->subject()->delete();
        $student->delete();
        return response()->json(['message' => 'Successfully Deleted Data']);
    }
}
