<?php

namespace Adminetic\Contact\Repositories;

use Illuminate\Support\Facades\Cache;
use Adminetic\Contact\Models\Admin\Contact;
use Adminetic\Contact\Http\Requests\ContactRequest;
use Adminetic\Contact\Contracts\ContactRepositoryInterface;

class ContactRepository implements ContactRepositoryInterface
{
    // Contact Index
    public function indexContact()
    {
        $contacts = config('coderz.caching', true)
            ? (Cache::has('contacts') ? Cache::get('contacts') : Cache::rememberForever('contacts', function () {
                return Contact::latest()->paginate(10);
            }))
            : Contact::latest()->paginate(10);
        return compact('contacts');
    }

    // Contact Create
    public function createContact()
    {
        //
    }

    // Contact Store
    public function storeContact(ContactRequest $request)
    {
        Contact::create($request->validated());
    }

    // Contact Show
    public function showContact(Contact $contact)
    {
        return compact('contact');
    }

    // Contact Edit
    public function editContact(Contact $contact)
    {
        return compact('contact');
    }

    // Contact Update
    public function updateContact(ContactRequest $request, Contact $contact)
    {
        $contact->update($request->validated());
    }

    // Contact Destroy
    public function destroyContact(Contact $contact)
    {
        $contact->delete();
    }
}
