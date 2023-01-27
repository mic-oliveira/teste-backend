<?php

namespace App\Http\Controllers\Api;

use App\Actions\Contact\CreateContact;
use App\Actions\Contact\FindContact;
use App\Actions\Contact\ListContactsByUser;
use App\Actions\Contact\UpdateContact;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostContactRequest;
use App\Http\Resources\Api\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return ContactResource::collection(ListContactsByUser::run(1));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return ContactResource
     */
    public function store(PostContactRequest $request): ContactResource
    {
        return ContactResource::make(CreateContact::run(Auth::user()->id,$request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ContactResource
     */
    public function show(Contact $contact): ContactResource
    {

        return ContactResource::make(FindContact::run(Auth::user()->id,$contact->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostContactRequest $request
     * @param Contact $contact
     * @return ContactResource
     */
    public function update(PostContactRequest $request, Contact $contact)
    {
        return ContactResource::make(UpdateContact::run($contact,Auth::user()->id,$request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return ContactResource::make($contact);
    }
}
