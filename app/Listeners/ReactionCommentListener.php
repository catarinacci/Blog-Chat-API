<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Notification;

use App\Notifications\ReactionCommentNotification;

class ReactionCommentListener
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
        $comment = Comment::where('id', $event->reactionComment->comment_id)->first();
        $user = User::where('id', $comment->user_id)->first();
        Notification::send($user, new ReactionCommentNotification($event->reactionComment));
    }
}
