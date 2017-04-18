<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ClientResetPassword extends Notification
{
    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * Create a new notification instance.
     *
     * @param $token
     */
    public function __construct($token)
    {
        $this->token = $token;
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
            ->view('vendor.notifications.email')
            ->subject('LaravelDemoSite 重新設定密碼')
            ->line('您收到這封電子郵件是因為我們收到了您帳戶的密碼重設要求&#x3002;')
            ->action('重設密碼', url('password/reset', $this->token))
            ->line('如果您未請求重設密碼，則無需進一步操作&#x3002;');
    }
}
