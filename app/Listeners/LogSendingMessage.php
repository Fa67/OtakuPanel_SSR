<?php

namespace App\Listeners;

use Illuminate\Mail\Events\MessageSending;

class LogSendingMessage
{
	/**
	 * Create the event listener.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param MessageSending $event
	 *
	 * @return void
	 */
	public function handle(MessageSending $event)
	{
		//\Log::info('MessageSending:' . var_export($event->data, true));
	}
}
