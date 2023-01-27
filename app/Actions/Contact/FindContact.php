<?php

namespace App\Actions\Contact;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;

class FindContact
{
    use AsAction;

    public function handle($userId,$contactId)
    {
        $contact = Contact::find($contactId);
        return $contact->user_id !== $userId ? throw new \Exception('Contato nao pertence a este usuário') : $contact;
    }
}
