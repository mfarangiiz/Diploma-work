<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index',
            [
                'users' => User::role('user')->paginate(15)
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'phone' => 'required|unique:users',
            'password' => ['required',
                'min:6',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            ],
        ]);
        User::create($request->all())->assignRole('user');
        return redirect()->back()->with('success', 'Foydalanuvchi yaratildi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = User::FindOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|in:5-7,7-10,10-12', // or 'in:1,2,3' if using TinyInt
            'phone' => 'required|digits_between:9,15|unique:users,phone,' . $user->id,
            'password' => 'nullable',
            'regex:/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]+$/',
            'confirmed'
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
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->back()->with('success', 'Foydalanuvchi yoqqilindi');
    }
}
