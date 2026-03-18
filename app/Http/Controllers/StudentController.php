<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class StudentController extends Controller
{
    public function index()
    {
        // ✅ keep role name consistent: use lowercase "student"
        $students = User::role('student')
            ->with('student')
            ->latest()
            ->paginate(10);

        return view('Student.index', compact('students'));
    }

    public function create()
    {
        // ✅ show next code in UI only
        $lastCode = Student::max('student_id'); // STD-007
        $lastNumber = $lastCode ? (int) substr($lastCode, 4) : 0;
        $studentCode = 'STD-' . str_pad((string)($lastNumber + 1), 3, '0', STR_PAD_LEFT);

        $courses = CourseCategory::all();

        return view('Student.create', compact('studentCode', 'courses'));
    }

    public function store(Request $request)
    {
        // ✅ do NOT validate role from request (we force it)
        $request->validate([
            'student_code'  => ['required','string','max:50'],
            'name'          => ['required','string','max:255'],
            'email'         => ['required','email','max:255','unique:users,email'],
            'password'      => ['required','string','min:6'],
            'gender'        => ['required','in:Male,Female'],
            'course'        => ['required','string','max:255'],
            'class_batch'   => ['nullable','string','max:255'],
            'dob'           => ['nullable','date'],
            'contact'       => ['nullable','string','max:50'],
            'address'       => ['nullable','string','max:255'],
            'profile_image' => ['nullable','image','mimes:jpg,jpeg,png,webp','max:2048'],
            'note'          => ['nullable','string','max:1000'],
        ]);

        DB::transaction(function () use ($request) {

            // ✅ Upload image
            $imagePath = null;
            if ($request->hasFile('profile_image')) {
                $imagePath = $request->file('profile_image')->store('students', 'public');
            }

            // ✅ SAFETY: generate student code again with lock (avoid duplicate)
            $lastCode = Student::lockForUpdate()->max('student_id');
            $lastNumber = $lastCode ? (int) substr($lastCode, 4) : 0;
            $newCode = 'STD-' . str_pad((string)($lastNumber + 1), 3, '0', STR_PAD_LEFT);

            // ✅ Create user
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // ✅ Ensure role exists + auto assign
            Role::firstOrCreate(['name' => 'student']);
            $user->assignRole('student');

            // ✅ Create student profile
            $user->student()->create([
                'student_id'    => $newCode,
                'gender'        => $request->gender,
                'course'        => $request->course,
                'class_batch'   => $request->class_batch,
                'dob'           => $request->dob,
                'contact'       => $request->contact,
                'address'       => $request->address,
                'profile_image' => $imagePath,
                'note'          => $request->note,
            ]);
        });

        return redirect()->route('students.list')->with('success', 'Student created successfully.');
    }
}
