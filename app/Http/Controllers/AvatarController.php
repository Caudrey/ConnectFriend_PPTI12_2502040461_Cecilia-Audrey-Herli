<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    //
    public function show(){
        $avatar = Avatar::all();

        return view('avatar', compact('avatar'));
    }
}
