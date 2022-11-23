<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function show(){
        $a = Auth::user()->notifications;
        return response()->json($a);
    }

    public function unread(){
        $ad = Auth::user()->unreadNotifications;
        return response()->json($ad);
    }


    public function read(){
        $a = Auth::user()->readNotifications;
        return response()->json($a);

    }

    public function maskasread($id){

        $notification = auth()->user()->notifications()->where('id', $id)->first();
        $notification->markAsRead();
        return $notification;
    }
}
