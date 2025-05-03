<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'digits:9'],
            'age' => ['required'],
            'password' => [
                'required',
                'min:6',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!$#%]).+$/',
                'confirmed', // Automatically links password_confirmation
                Rules\Password::defaults(),
            ],
        ]);

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'age' => $request->age,
            'password' => Hash::make($request->password),
        ])->assignRole('user');

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));

    }
}
