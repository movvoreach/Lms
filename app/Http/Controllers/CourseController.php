<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('category')->latest()->get();
        return view('Course.index', compact('courses'));
    }

    public function create()
    {
        $categories = CourseCategory::where('is_active', 1)->orderBy('name')->get();
        return view('Course.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:course_categories,id',
            'title' => 'required|string|max:255',
            'code' => 'nullable|string|max:50|unique:courses,code',
            'duration_hours' => 'nullable|integer|min:1',
            'fee' => 'nullable|numeric|min:0',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_active' => 'required|in:0,1',
            'description' => 'nullable|string',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // ✅ Upload thumbnail
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $name = 'course_' . time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $thumbnailPath = $file->storeAs('courses', $name, 'public');
        }

        Course::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'code' => $request->code,
            'description' => $request->description,
            'duration_hours' => $request->duration_hours,
            'fee' => $request->fee ?? 0,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'is_active' => $request->is_active,
            'thumbnail' => $thumbnailPath,
        ]);

        return redirect()->route('course.index')->with('success', 'Course created successfully!');
    }
}
