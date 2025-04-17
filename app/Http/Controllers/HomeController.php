<?php

namespace App\Http\Controllers;

use App\Models\Abakus;
use App\Models\HomePage;
use App\Models\User;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('admin.dashboard', [
                'students' => User::role('user')->count(),
                'teachers' => User::role('teacher')->count(),
                'lessons' => Abakus::all()->count(),
            ]);
        } else
            return view('admin.users.index',['users'=>User::role('user')->paginate(10)]);
    }


    public function index()
    {
        return view('index', [
            'home' => HomePage::first()
        ]);
    }

    public function abakus()
    {
        if (auth()->user()->hasRole('admin')) {
            $abakuses = Abakus::where('status', 1)->paginate(1);
        } else {
            $abakuses = Abakus::where('status', 1)->where('age', auth()->user()->age)->paginate(1);
        }

        return view('abacus', [
            'abakuses' => $abakuses
        ]);
    }

    public function motorika()
    {
        if (auth()->user()->hasRole('admin'))
            $motorikas = Abakus::where('status', 2)->paginate(1);
        else
            $motorikas = Abakus::where('status', 2)->where('age', auth()->user()->age)->paginate(1); // fixed typo!

        return view('motorika', [
            'motorikas' => $motorikas
        ]);
    }


    public function about()
    {
        return view('about', [
        ]);
    }
}
