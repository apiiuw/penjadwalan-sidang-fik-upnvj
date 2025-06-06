<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NilaiSidangUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nilai;

    public function __construct($nilai)
    {
        $this->nilai = $nilai;
    }

    public function build()
    {
        return $this->subject('Pemberitahuan Nilai Sidang Anda')
                    ->markdown('emails.nilai_sidang_updated');
    }
}

