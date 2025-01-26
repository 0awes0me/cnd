<?php

namespace App\Domains\Contact\Actions;

use App\Domains\Abstract\Actions\AbstractAction;
use App\Domains\Contact\Models\ContactFormSubmission;
use Illuminate\Http\JsonResponse;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Lorisleiva\Actions\ActionRequest;

class SaveContactForm extends AbstractAction
{

    public function rules(): array
    {
        return [
            'name'    => ['required'],
            'email'   => ['required', 'email'],
            'subject' => ['required'],
            'message' => ['required'],
        ];
    }

    public function asController(ActionRequest $request): JsonResponse
    {
        $form = $this->handle(
            $request->validated('name'),
            $request->validated('email'),
            $request->validated('subject'),
            $request->validated('message')
        );

        return response()->json([
            'message' => __('Created !'),
            'data'    => $form
        ]);
    }

    public function handle($name, $email, $subject, $message)
    {

        $contact = SaveContact::make()->handle($name, $email);

        return $contact->formSubmissions()->create([
            'subject' => $subject,
            'message' => $message,
        ]);

    }
}
