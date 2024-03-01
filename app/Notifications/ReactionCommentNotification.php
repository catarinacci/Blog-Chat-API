<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Helpers\FormatTime;

class ReactionCommentNotification extends Notification
{
    use Queueable;
    public $reactionComment;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($reactionComment)
    {
        $this->reactionComment = $reactionComment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $time = FormatTime::LongTimeFilter($this->reactionComment->created_at);
        return [
            'reaction_id' => $this->reactionComment->id,
            'note_id' => $this->reactionComment->reactionmable_id,
            'user_id' => $this->reactionComment->user_id,
            'typereaction_id' => $this->reactionComment->mensaje,
            'ceated_at' => now(),
            'updated_at' => now(),
            'time' => $time
        ];
    }
}
