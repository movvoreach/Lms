<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = User::role('teacher')->with('teacher')->latest()->get();

        $totalTeachers = $teachers->count();
        $withPhoto = $teachers->filter(fn ($t) => ! empty($t->teacher?->profile_image))->count();
        $noPhoto = $totalTeachers - $withPhoto;

        $newThisMonth = $teachers->filter(function ($t) {
            return $t->created_at && $t->created_at->format('Y-m') === now()->format('Y-m');
        })->count();

        return view('Teachers.index', compact('teachers', 'totalTeachers', 'withPhoto', 'noPhoto', 'newThisMonth'));
    }

    public function create()
    {
        // ✅ next code for UI only
        $lastCode = Teacher::max('teacher_code'); // TCH-007
        $lastNumber = $lastCode ? (int) substr($lastCode, 4) : 0;
        $nextTeacherId = 'TCH-'.str_pad((string) ($lastNumber + 1), 3, '0', STR_PAD_LEFT);

        return view('Teachers.create', compact('nextTeacherId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => ['required', 'string', 'max:50'], // readonly display
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
            'course' => ['required', 'string', 'max:100'],
            'experience' => ['nullable', 'string', 'max:100'],
            'education' => ['nullable', 'string', 'max:100'],
            'skills' => ['nullable', 'string', 'max:255'],
            'contact' => ['nullable', 'string', 'max:50'],
            'note' => ['nullable', 'string', 'max:1000'],
            'profile_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        DB::transaction(function () use ($request) {

            // ✅ upload image
            $imagePath = null;
            if ($request->hasFile('profile_image')) {
                $imagePath = $request->file('profile_image')->store('teachers', 'public');
            }

            // ✅ generate safe teacher_code (avoid duplicates)
            $lastCode = Teacher::lockForUpdate()->max('teacher_code');
            $lastNumber = $lastCode ? (int) substr($lastCode, 4) : 0;
            $newCode = 'TCH-'.str_pad((string) ($lastNumber + 1), 3, '0', STR_PAD_LEFT);

            // ✅ create user
            $user = User::create([
                'teacher_id' => $newCode,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // ✅ ensure role exists then assign automatically
            Role::firstOrCreate(['name' => 'teacher']);
            $user->assignRole('teacher');

            // ✅ create teacher profile
            $user->teacher()->create([
                'teacher_code' => $newCode,
                'course' => $request->course,
                'phone' => $request->contact,
                'education' => $request->education,
                'experience' => $request->experience,
                'skills' => $request->skills,
                'profile_image' => $imagePath,
                'note' => $request->note,
            ]);
        });

        return redirect()->route('teacher.index')->with('success', 'Teacher created successfully!');
    }

    public function edit(User $user)
    {
        // ✅ allow only teacher user editing (optional)
        if (! $user->hasRole('teacher')) {
            abort(403);
        }

        $user->load('teacher');

        return view('Teachers.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if (! $user->hasRole('teacher')) {
            abort(403);
        }

        $request->validate([
            'teacher_id' => ['required', 'string', 'max:50'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:6'],

            'course' => ['required', 'string', 'max:100'],

            'experience' => ['nullable', 'string', 'max:100'],
            'education' => ['nullable', 'string', 'max:100'],
            'skills' => ['nullable', 'string', 'max:255'],
            'contact' => ['nullable', 'string', 'max:50'],
            'note' => ['nullable', 'string', 'max:1000'],
            'profile_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        DB::transaction(function () use ($request, $user) {

            $userData = [
                'teacher_id' => $request->teacher_id,
                'name' => $request->name,
                'email' => $request->email,
            ];

            if ($request->filled('password')) {
                $userData['password'] = Hash::make($request->password);
            }

            $user->update($userData);

            // ✅ keep role always teacher
            Role::firstOrCreate(['name' => 'teacher']);
            $user->syncRoles(['teacher']);

            $imagePath = $user->teacher?->profile_image;
            if ($request->hasFile('profile_image')) {
                $imagePath = $request->file('profile_image')->store('teachers', 'public');
            }

            $user->teacher()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'teacher_code' => $request->teacher_id,
                    'course' => $request->course,
                    'phone' => $request->contact,
                    'education' => $request->education,
                    'experience' => $request->experience,
                    'skills' => $request->skills,
                    'profile_image' => $imagePath,
                    'note' => $request->note,
                ]
            );
        });

        return redirect()->route('teacher.index')->with('success', 'Teacher updated successfully!');
    }

    public function destroy(User $user)
    {
        if (! $user->hasRole('teacher')) {
            abort(403);
        }

        $user->delete();

        return back()->with('success', 'Teacher deleted successfully!');
    }
}
