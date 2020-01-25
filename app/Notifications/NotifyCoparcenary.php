<?php

namespace App\Notifications;

use App\Models\Works\Coparcenary;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotifyCoparcenary extends Notification implements ShouldQueue
{
	use Queueable;

	public $coparcenary;
	/**
	 * Create a new notification instance.
	 *
	 * @param  \App\Models\Works\Coparcenary $coparcenary
	 * @return void
	 */
	public function __construct(Coparcenary $coparcenary)
	{
		$this->coparcenary = $coparcenary;
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
		$url = route('works.view_coparcenay',[$this->coparcenary->id,$this->coparcenary->token]);
		$client = $this->coparcenary->work->owner;
		return (new MailMessage)
			->subject('Confirmação de Participação')
			->greeting('Olá, ' . $this->coparcenary->getName() . '!')
			->line($client->getName() . ' compartilhou um trabalho registrado em Blockchain com você.')
			->line('Clique no link abaixo para confirmar sua participação.')
			->action('Visualizar Trabalho', $url);
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

