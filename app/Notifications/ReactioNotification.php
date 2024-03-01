<?php

namespace App\Notifications;

use App\Models\Reactionm;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Reaction;
use App\Models\User;
use App\Helpers\FormatTime;
use App\Models\ReactionMorph;


class ReactioNotification extends Notification
{
    use Queueable;

    public $res;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Reactionm $res)
    {
        $this->res = $res;
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
        $time = FormatTime::LongTimeFilter($this->res->created_at);
        return [
            'reaction_id' => $this->res->id,
            'note_id' => $this->res->reactionmable_id,
            'user_id' => $this->res->user_id,
            'typereaction_id' => $this->res->mensaje,
            'ceated_at' => now(),
            'updated_at' => now(),
            'time' => $time
        ];
    }
}
