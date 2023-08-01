<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    //
    public function like(Request $request){
        $relation = Friend::find($request->userID)->where('liked_user_id', '=', $request->likedID);
        if($relation){
            $friend = Friend::create([
                'user_id' => $request->userID,
                'liked_id' => $request->likedID,
                'status' => 1
            ]);
        }
        return redirect('/home');
    }
}
