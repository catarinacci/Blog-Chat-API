<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Note;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Notifications\CommentNotification;

class CommentListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
       $nota = Note::where('id', $event->comment->note_id)->first();
       $user = User::where('id', $nota->user_id)->first();
       Notification::send($user, new CommentNotification($event->comment));
    }
}
