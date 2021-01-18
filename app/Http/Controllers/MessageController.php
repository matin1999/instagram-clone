<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function show($id)
    {
        $user=User::with('image')->find($id)->get();
        return view('direct.show',compact('user',$user));
    }

    public function sendMessage(Request $request)
    {
        // Do the validation...

        // Send the message from the current user to the user with ID of 1,
        // You probably always want the current logged-in user as the sender.
        // We talk about the recipient later...
        //
        Auth::user()->sendMessageTo(1,  $request->body);

        // Set flash message, render view, etc...
    }
}
