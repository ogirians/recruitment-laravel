<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Psikotest_Invitation_no_reply
 extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $registrasi;
    public $nama2;
    public $waktu2;
    public $tempat2;
    public $data;

    public function __construct($data)

    {

    $this->nama = $data['nama'];
    $this->waktu = $data['waktu'];
    $this->tempat = $data['tempat'];
    $this->jam = $data['jam'];

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from($address = 'HRD@indoberkainvestama.com', $name = 'HRD')
        ->view('emailku')
        ->with([
            'nama' => $this->nama,
            'waktu' => $this->waktu,
            'jam' => $this->jam,
            'tempat' => $this->tempat,
        ]);
    }
}