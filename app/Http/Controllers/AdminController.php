<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function homepage()
    {
        return view('admin.homepage');
    }

    public function honePageSetting(Request $request)
    {
        HomePage::first()->update($request->all());
        return redirect()->back()->with('success','saqlandi!!!');
    }
}
