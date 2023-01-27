<?php

namespace App\Actions\Contact;

use App\Models\Contact;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateContact
{
    use AsAction;

    public function handle(Contact $contact,$userId,array $contactData )
    {
        if ($userId != $contact->user_id) {
            throw new \Exception('Contato nao pertence a este usuário');
        }
        $contact->fill($contactData)->save();
        return $contact->refresh();
    }
}
