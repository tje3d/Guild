<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CharacterStatus extends Mailable
{
    use Queueable, SerializesModels;

	private $character;
	private $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($character, $message)
    {

		$this->character = $character;
		$this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('contact@abilityguild.ir')
            ->subject(config('app.name'))
            ->to($this->character->email, $this->character->name)
            ->markdown('mails.characterstatus', [
                'text' => $this->message,
            ]);
    }
}
