<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserAccountEnableDisable extends Notification implements ShouldQueue
{
    use Queueable;
    public $user;

    /**
     * Create a new notification instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $name = $this->user->name;
        if (!$this->user->is_disabled)

            return (new MailMessage)
                ->subject('User Account Activated Successfully')
                ->line("Hi $name. Your Account has been reviewed and  successfully activated.")
                ->line("If you have any queries related to your account, feel free to mail us on our support.")
                ->line('Thank you for using GameOn !');
        else {
            return (new MailMessage)
                ->subject('User Account Disabled Temporarily')
                ->line("Hi $name. Your Account has been disabled temporarily due to violation of our terms and conditions")
                ->line("If you have any queries related to your account, feel free to mail us on our support.")
                ->line('Thank you for using GameOn !');
        }
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
