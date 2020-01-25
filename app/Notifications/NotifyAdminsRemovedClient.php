<?php

namespace App\Notifications;

use App\Models\Clients\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotifyAdminsRemovedClient extends Notification implements ShouldQueue
{
    use Queueable;

    public $client;
    /**
     * Create a new notification instance.
     *
     * @param  \App\Models\Clients\Client $client
     * @return void
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
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
	    $url = route('clients.edit',$this->client->id);
        return (new MailMessage)
	        ->subject('Remoção de Conta')
	        ->greeting('Olá, Administrador!')
	        ->line('O cliente ' . $this->client->getName() . ' acabou de remover sua conta.')
	        ->line('Clique no link abaixo para visualizar o seu perfil.')
	        ->action('Visualizar cliente', $url);
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
