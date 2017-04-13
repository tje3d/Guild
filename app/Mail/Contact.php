<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    private $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    	$this->data['name'] = ucfirst(strtolower($this->data['name']));

        return $this->from('contact@abilityguild.ir')
            ->subject(config('app.name') . ' - ' . str_limit($this->data['name'], 20))
            ->to('tje3d@yahoo.com', 'Moein')
            ->cc('scooterlinuxs@gmail.com', 'Mohammad Reza')
            ->markdown('mails.contact', [
                'from' => $this->data['email'],
                'name' => $this->data['name'],
                'text' => nl2br($this->data['message']),
            ]);
    }
}
