<?php

namespace App\Domains\Contact\Actions;

use App\Domains\Abstract\Actions\AbstractAction;
use App\Domains\Contact\Models\Contact;
use App\Domains\Contact\Models\ContactFormSubmission;
use App\Domains\Mail\Actions\SendEmail;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Lorisleiva\Actions\Action;

class SendContactFormSubmittedEmail extends AbstractAction
{

    public function handle(ContactFormSubmission $data)
    {
        $this->sendAdminEmail($data);
        $this->sendUserConfirmationEmail($data);
    }

    private function sendUserConfirmationEmail(ContactFormSubmission $data)
    {
        $confirmationMailBody = view('email/contactFormSubmitConfirmationEmail', ['data' => $data])->render();
        SendEmail::make()->handle($data->contact->email, 'We received your email', $confirmationMailBody);
    }

    private function sendAdminEmail(ContactFormSubmission $data)
    {
        //minor hack;
        $adminEmail = env('ADMIN_EMAIL', 'admin@example.com');
        $adminMailBody = view('email/contactFormSubmittedEmail', ['data' => $data])
            ->render();

        SendEmail::make()->handle($adminEmail, 'Contact Form Submitted !', $adminMailBody);
    }
}
