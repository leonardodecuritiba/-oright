<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotifyAdminNewsletter extends Notification implements ShouldQueue
{
    use Queueable;
	public $contact;

    /**
     * Create a new notification instance.
     * @param  $contact
     * @return void
     */
	public function __construct($contact)
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
		    ->subject('Novo Cadastro de Newsletter')
		    ->greeting('Olá, Administrador!')
		    ->line('O email (' . $this->contact . ') acabou de se inscrever pelo formulário de Newsletter.');
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
