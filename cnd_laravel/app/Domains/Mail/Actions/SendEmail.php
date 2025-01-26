<?php

namespace App\Domains\Mail\Actions;

use App\Domains\Abstract\Actions\AbstractAction;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class SendEmail extends AbstractAction
{

    public function handle($to, $subject, $body, $sendEmail = 'hello@example', $senderName = 'example')
    {
        $mailable = new Mailable();
        $mailable->from($sendEmail, $senderName);
        $mailable->subject('Contact : ' . $subject);
        $mailable->html($body);
        return Mail::to($to)->send($mailable);
    }
}
