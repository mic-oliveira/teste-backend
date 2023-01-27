<?php

namespace App\Actions\Contact;

use App\Models\Contact;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ListContactsByUser
{
    use AsAction;

    public function handle($userId)
    {

        return QueryBuilder::for(Contact::class)
            ->where('user_id', $userId)
            ->allowedFilters([
                AllowedFilter::scope('contact', 'filterByNameOrContact')
            ])->get();
    }
}
