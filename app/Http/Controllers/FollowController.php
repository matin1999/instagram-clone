<?php

namespace App\Http\Controllers;

use App\Models\Following;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // only authenticated users can access this route
    }

    public function follow($id)
    {
        $record = Following::where([
            ['following_id', $id],
            ['follower_id', Auth::id()],
        ]);

        //If our record doesn't exist we create it
        if ($record->first() === null) {
            $follow = new Following();
            $follow->following_id = $id;
            $follow->follower_id = Auth::id();
            $follow->save();

            //If it exists we delete it
        } else {
            $record->delete();
        }

        return redirect()->route('account.show', $id);
    }
}
