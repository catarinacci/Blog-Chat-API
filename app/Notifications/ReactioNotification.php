<?php

namespace App\Notifications;

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

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ReactionMorph $reaction)
    {
        $this->reaction = $reaction;
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
        $reaction = Reaction::where('id', $this->reaction->typereaction_id)->first();
       // $name = User:: $reaction->name;
        $time = FormatTime::LongTimeFilter($this->reaction->created_at);
        return [
            'reaction_id' => $this->reaction->id,
            // 'note_id' => "/api/note/" . $this->reaction->note_id,
            // 'user_id' => "/api/user/" . $this->reaction->user_id,
            // 'content' => $this->reaction->content,
            // 'typereaction_name' => $name,
            // "id" => $this->id,
            // 'note_id' =>"/api/note/". $this->note_id,
            // 'user_id' => "/api/user/".$this->user_id,
            // "name" => User::find($this->reaction->user_id)->name,
            'typereaction_id' => $this->reaction->typereaction_id,
            //'typereaction' => TypeReaction::find($this->typereaction_id)->name,
            //"type" => $this->typereaction->name,
            'reacción creada '=> $time,
        ];
    }
}
