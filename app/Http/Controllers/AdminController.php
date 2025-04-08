<?php

namespace App\Http\Controllers;

use App\Models\Chat;
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
        return redirect()->back()->with('success', 'saqlandi!!!');
    }

    public function markMessagesAsRead($id)
    {
        // Find the messages for the user and mark them as answered
        Chat::where('user_id', $id)->where('answered', 0)->update(['answered' => 1]);

        return response()->json(['message' => 'Messages marked as read']);
    }

}
