<?php

namespace App\Domains\Contact\Actions;

use App\Domains\Abstract\Actions\AbstractAction;
use App\Domains\Contact\Models\Contact;
use Illuminate\Support\Facades\Request;
use Lorisleiva\Actions\Action;

class SaveContact extends AbstractAction
{

    public function rules()
    {
        return [
            'name'  => ['required'],
            'email' => ['required', 'email'],
        ];
    }

    public function getValidationMessages(): array
    {
        return [
            'name.required'  => 'Looks like you forgot to enter your name.',
            'email.required' => 'Email address is required.',
            'email.email'    => 'Email address needs to be a real email.',
        ];
    }

    public function asController(Request $request)
    {
        try {

            $contact = $this->handle($request->get('name'), $request->get('email'));
        } catch (\Exception $e) {
            return response()->json([
                'message' => __('Unable to create contact'),
            ], 417);
        }
        return response()->json([
            'message' => __('Contact Created !'),
            'data'    => $contact,
        ]);
    }

    public function handle(string $name, string $email)
    {

        $contact = Contact::updateOrCreate([
            'email' => $email,
        ], ['name' => $name]);

        return $contact;
    }
}
