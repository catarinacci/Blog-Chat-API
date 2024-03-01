<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use App\Http\Resources\ChatResource;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function chatroomCreate(Request $request){

        $chatroom = Chat::create([
            'name' => $request->name
        ]);

        $chatroom->users()->attach(Auth::user()->id);

        return new ChatResource($chatroom);
    }

}
