<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JadwalSidangDikirim extends Mailable
{
    use Queueable, SerializesModels;

    public $mahasiswa;

    public function __construct($mahasiswa)
    {
        $this->mahasiswa = $mahasiswa;
    }

    public function build()
    {
        return $this->subject('Jadwal Sidang Anda Telah Ditetapkan')
                    ->view('emails.jadwal_sidang_dikirim');
    }
}
