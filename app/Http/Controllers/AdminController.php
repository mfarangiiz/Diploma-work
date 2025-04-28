<?php

namespace App\Http\Controllers;

use App\Models\Abakus;
use App\Models\Chat;
use App\Models\HomePage;
use App\Models\Test;
use App\Models\User;
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
        return redirect()->back()->with('success', 'saqlandi!!!');
    }

    public function markMessagesAsRead($id)
    {
        // Find the messages for the user and mark them as answered
        Chat::where('user_id', $id)->where('answered', 0)->update(['answered' => 1]);

        return response()->json(['message' => 'Messages marked as read']);
    }

    public function searchLesson(Request $request)
    {
        $query = Abakus::query();

        if ($request->has('age_filter') && $request->age_filter != '') {
            $query->where('age', $request->age_filter)->where('status', $request->status);
        }

        $motorikaes = $query->paginate(10);
        if ($request->status == 1)

            return view('admin.abakus.index', ['abakuses' => $motorikaes]);
        else
            return view('admin.motorika.index', ['motorikaes' => $motorikaes]);
    }
    public function filterUser(Request $request)
    {
        $query = User::query();

        if ($request->has('age_filter') && $request->age_filter != '') {
            $query->where('age', $request->age_filter);
        }

        $motorikaes = $query->paginate(10);
        if ($request->status == 1)

            return view('admin.users.index', ['users' => $motorikaes]);
        else
            return view('admin.users.index', ['users' => $motorikaes]);
    }
    public function testFilter(Request $request)
    {
        $query = Test::query();

            
        $query->where('status', $request->test);

        $motorikaes = $query->paginate(10);
        // dd($motorikaes);

        return view('admin.test.index',['tests'=>$motorikaes]);
    }
    public function testFilterAge(Request $request)
    {
        $query = Test::query();

        $query->where('age', $request->test);

        $motorikaes = $query->paginate(10);
        // dd($motorikaes);

        return view('admin.test.index',['tests'=>$motorikaes]);
    }
}