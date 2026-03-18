<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Course;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    // Show subject list
    public function index()
    {
        $subjects = Subject::with('course')->latest()->get();
        return view('Subject.index', compact('subjects'));
    }

    // Show create form
    public function create()
    {
        $courses = Course::orderBy('title')->get();
        return view('Subject.create', compact('courses'));
    }

    // Store subject
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'course_id' => 'required',
    //         'name' => 'required|string|max:255',
    //         'code' => 'nullable|string|max:50',
    //         'credit' => 'nullable|numeric',
    //         'description' => 'nullable|string',
    //         'is_active' => 'required'
    //     ]);

    //     Subject::create([
    //         'course_id' => $request->course_id,
    //         'name' => $request->name,
    //         'code' => $request->code,
    //         'credit' => $request->credit,
    //         'description' => $request->description,
    //         'is_active' => $request->is_active,
    //     ]);

    //     return redirect()->route('subject.index')
    //         ->with('success', 'Subject created successfully');
    // }

    // Edit subject
    // public function edit($id)
    // {
    //     $subject = Subject::findOrFail($id);
    //     $courses = Course::all();

    //     return view('admin.subjects.edit', compact('subject','courses'));
    // }

    // // Update subject
    // public function update(Request $request, $id)
    // {
    //     $subject = Subject::findOrFail($id);

    //     $request->validate([
    //         'course_id' => 'required',
    //         'name' => 'required'
    //     ]);

    //     $subject->update([
    //         'course_id' => $request->course_id,
    //         'name' => $request->name,
    //         'code' => $request->code,
    //         'credit' => $request->credit,
    //         'description' => $request->description,
    //         'is_active' => $request->is_active,
    //     ]);

    //     return redirect()->route('subject.index')
    //         ->with('success','Subject updated successfully');
    // }

    // // Delete subject
    // public function destroy($id)
    // {
    //     $subject = Subject::findOrFail($id);
    //     $subject->delete();

    //     return back()->with('success','Subject deleted successfully');
    // }
}
