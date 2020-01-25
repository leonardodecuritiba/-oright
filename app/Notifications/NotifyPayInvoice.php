<?php

namespace App\Notifications;

use App\Models\Clients\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotifyPayInvoice extends Notification implements ShouldQueue
{
	use Queueable;

	public $invoice;
	/**
	 * Create a new notification instance.
	 *
	 * @param  \App\Models\Clients\Invoice $invoice
	 * @return void
	 */
	public function __construct(Invoice $invoice)
	{
		$this->invoice = $invoice;
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
		$url = route('client_works.create');
		return (new MailMessage)
			->success()
			->subject('Pagamento Confirmado')
			->greeting('Parabéns ' . $this->invoice->assign->client->getName() . '!')
			->line('O pagamento da sua assinatura foi confirmado!')
			->line('INSTRUÇÕES IMPORTANTES: Baixe este selo de autenticidade e guarde em seu computador. Ele será o seu registro de usuário Orights. A cada projeto que enviar ao seu parceiro/cliente, cole abaixo do selo de autenticidade o código blockchain do seu projeto para garantir a autoria.')
//			->line(public_path('assets/images/copyright/rights.jpg'))
			->line('Seu ID é: '.$this->invoice->assign->client->private_key)
			->line('Copie e cole o código blockchain do projeto abaixo do selo e envie ao seu parceiro/cliente.')
			->line('Clique no link abaixo para criar um novo trabalho.')
			->action('Criar Trabalho', $url);
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

