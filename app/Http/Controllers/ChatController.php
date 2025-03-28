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

        if (!empty($request->message) && (!$message || $message->answered)) {
            Chat::create([
                'user_id' => auth()->id(),
                'message' => $request->message,
                'status' => 0,
            ]);

            return redirect()->back()->with('success', 'Xabar yuborildi');
        }

        return redirect()->back()->with('error', 'Avvalgi xabaringiz hali javoblanmagan');

    }

    public function receive(Request $request, $id)
    {
        $request->validate([
            'message' => 'required'
        ]);

        $user = User::query()->findOrFail($id);

        Chat::query()->where('user_id', auth()->id())->where('answered', 0)->update(['answered' => 1]);

        Chat::create([
            'user_id' => $user->id,
            'message' => $request->message,
            'status' => 1,
        ]);
        return redirect()->back()->with('success', 'Xabar Yuborildi');
    }

}
