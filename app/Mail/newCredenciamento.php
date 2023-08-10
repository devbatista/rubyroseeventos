<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class newCredenciamento extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $melu;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $melu = false)
    {
        $this->data = $data;
        $this->melu = $melu;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->melu) {
            $this->subject('noreply - Credenciamento Ruby Rose');
        } else {
            $this->subject('noreply - Credenciamento Melu - by Ruby Rose');
        }
        
        $this->to($this->data['email'], $this->data['nome']);

        if($this->melu) {
            return $this->view('melu', ['data' => $this->data]);
        } else {
            return $this->view('mail', ['data' => $this->data]);
        }
    }
}
