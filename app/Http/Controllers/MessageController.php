<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function index()
    {
        $talkedBeforeIds = DB::table('messages')
            ->where('sender_id', '=', Auth::id())
            ->pluck('sent_to_id')
            ->toArray();
        $users = User::whereIn('id', $talkedBeforeIds)->get();
        //last massage
        return view('direct.list')->with('users', $users);


    }

    public function show($id)
    {
        $sents = Message::with('sender', 'receiver')
            ->where('sent_to_id', $id)
            ->where('sender_id', Auth::id())
            ->get();
        $recieves = Message::with('sender', 'receiver')
            ->where('sender_id', $id)
            ->where('sent_to_id', Auth::id())
            ->get();
        $messages = collect();

        foreach ($sents as $sent)
            $messages->push($sent);

        foreach ($recieves as $recieve)
            $messages->push($recieve);
        $messages = $messages->sortBy('created_at');
        return view('direct.show', compact(['messages', 'id']));
    }

    public function sendMessage(Request $request, $id)
    {
        Auth::user()->sendMessageTo($id, $request->body);
        return redirect()->back();

    }
}
