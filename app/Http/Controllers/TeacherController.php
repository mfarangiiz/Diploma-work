<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\User;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.teachers.index', ['teachers' => User::role('teacher')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:users',
            'password' => 'required',
        ]);
        User::create($request->all())->assignRole('teacher');
        return redirect()->back()->with('success', 'Foydalanuvchi yaratildi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, $id)
    {
        $user = User::FindOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|digits_between:9,15|unique:users,phone,' . $user->id,
            'password' => 'nullable|min:6', // nullable if you don’t want to require password on edit
        ]);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']); // don't overwrite with NULL
        }

        $user->update($data);

        return redirect()->back()->with('success', 'Foydalanuvchi saqlandi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $teacher)
    {
        $teacher->delete();
        return redirect()->back()->with('success', 'Foydalanuvchi yoqqilindi');
    }
}
