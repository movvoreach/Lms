<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
   public function index()
{
    $users = \App\Models\User::with('roles')->latest()->get();

    $totalUsers = \App\Models\User::count();
    $admins     = \App\Models\User::role('admin')->count();
    $teachers   = \App\Models\User::role('teacher')->count();
    $students   = \App\Models\User::role('student')->count();
    $staff      = \App\Models\User::role('staff')->count();

    return view('admin.users.index', compact(
        'users','totalUsers','admins','teachers','students','staff'
    ));
}

    public function edit($id)
    {
        $user = User::with('roles')->findOrFail($id);

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->roles->first()?->name,
        ]);
    }

    public function store(Request $request)
    {
        $userId = $request->user_id;

        $rules = [
            'name'  => ['required','string','max:255'],
            'email' => ['required','email','max:255','unique:users,email'.($userId ? ','.$userId : '')],
            'role'  => ['required','exists:roles,name'],
        ];

        if (!$userId) {
            $rules['password'] = ['required','min:6','confirmed'];
        } else {
            if ($request->filled('password')) {
                $rules['password'] = ['min:6','confirmed'];
            }
        }

        $data = $request->validate($rules);

        if ($userId) {
            $user = User::findOrFail($userId);
            $user->name = $data['name'];
            $user->email = $data['email'];

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            $user->save();
        } else {
            $user = User::create([
                'name'     => $data['name'],
                'email'    => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        }

        $user->syncRoles([$data['role']]);

        return response()->json([
            'success' => true,
            'message' => $userId ? 'User updated successfully' : 'User created successfully'
        ]);
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'User deleted successfully'
        ]);
    }
}
