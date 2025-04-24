<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use App\Models\User;
use Illuminate\Http\Request;


class ChatController extends Controller
{
    public function send(StoreChatRequest $request)
    {

        $message = Chat::where('user_id', auth()->id())->latest()->first();


        if (!empty($request->message)) {

            Chat::create([
                'user_id' => auth()->id(),
                'message' => $request->message,
                'answered' => 0,
                'status' => 0 ,
            ]);

            return redirect()->back()->with('success', 'Xabar yuborildi');
        }else

        return redirect()->back()->with('error', 'Avvalgi xabaringiz hali javoblanmagan');

    }

    public function receive(Request $request, $id)
    {
        $request->validate([
            'message' => 'required'
        ]);

        Chat::query()->where('user_id', $id)->where('answered', 0)->update(['answered' => 1]);

        Chat::create([
            'user_id' => $id,
            'message' => $request->message,
            'status' => 1,
        ]);
        return redirect()->back()->with('success', 'Xabar Yuborildi');
    }

    public function markAsRead(User $user)
    {
        Chat::where('user_id', $user->id)
            ->where('status', 0) // messages from user
            ->where('answered', 0)
            ->update(['answered' => 1]);

        return response()->json(['success' => true]);
    }

    public function markAsAnswered(Request $request)
    {
        Chat::where('user_id', auth()->id())
            ->where('answered', 0)
            ->where('status', 1)
            ->update(['answered' => 1]);

        return response()->json(['success' => true]);
    }

}
