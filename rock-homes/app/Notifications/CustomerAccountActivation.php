<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomerAccountActivation extends Notification implements ShouldQueue
{
    use Queueable;
    private $message;
    private $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message, $token)
    {
        # code ...
        $this->message  =   $message;
        $this->token  =   $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
        ->subject($this->message['subject'])
        ->greeting($this->message['greeting'] . ' ' . $this->message['recipient'])
        ->line($this->message['body'])
        ->line('Your Email Address:  ' . $this->message['email'])
        ->line('Your Password:  ' . $this->message['password'])
        ->action($this->message['actionText'], $this->message['actionURL'])
        ->line($this->message['appreciation']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}