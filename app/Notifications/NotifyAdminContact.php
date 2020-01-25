<?php

namespace App\Notifications;

use App\Models\Users\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotifyAdminContact extends Notification implements ShouldQueue
{
    use Queueable;
	public $contact;

    /**
     * Create a new notification instance.
     * @param  array $contact
     * @return void
     */
	public function __construct(array $contact)
	{
		$this->contact = $contact;
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
		    ->subject('Nova Mensagem')
		    ->greeting('Olá, Administrador!')
		    ->line($this->contact['name'] . ' (' . $this->contact['email'] . ') acabou de entrar em contato pelo formulário do site.')
		    ->line('Mensagem:')
		    ->line('"' . $this->contact['message'] . '"');
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
