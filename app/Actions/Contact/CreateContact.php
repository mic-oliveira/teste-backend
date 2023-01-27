<?php

namespace App\Actions\Contact;

use App\Models\Contact;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateContact
{
    use AsAction;

    public function handle($userId,array $contact)
    {
        $contact = array_merge(['user_id' => $userId], $contact);
        return Contact::create($contact);
    }
}
