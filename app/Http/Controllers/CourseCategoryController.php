<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use Illuminate\Http\Request;

class CourseCategoryController extends Controller
{
    public function index()
    {
        $categories = CourseCategory::latest()->get();
        return view('Course.course_category', compact('categories'));
    }

    public function create()
    {
        return view('Course.course_category');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:course_categories,name',
            'description' => 'nullable|string',
            'is_active' => 'required|in:0,1',
        ]);

        CourseCategory::create($request->all());

        return redirect()->route('course-categories.index')
            ->with('success', 'Category created successfully!');
    }
}
