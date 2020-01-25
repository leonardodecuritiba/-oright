<?php

namespace App\Notifications;

use App\Models\Users\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RegisteredUser extends Notification implements ShouldQueue
{
    use Queueable;
	public $user;

    /**
     * Create a new notification instance.
     * @param  \App\Models\Users\User $user
     * @return void
     */
	public function __construct(User $user)
	{
		$this->user = $user;
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
	    $url = route('user.verify',$this->user->getVerifyToken());
        return (new MailMessage)
	        ->subject('Bem Vindo')
	        ->greeting('Bem vindo, ' . $this->user->getName() . '!')
	        ->line('Seu email registrado é ' . $this->user->email)
	        ->line('Por favor, clique no link abaixo para validar seu cadastro.')
	        ->action('Validar Cadastro', $url);
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
