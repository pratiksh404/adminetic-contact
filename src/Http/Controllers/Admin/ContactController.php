<?php

namespace Adminetic\Contact\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Adminetic\Contact\Models\Admin\Contact;
use Adminetic\Contact\Exports\ContactsExport;
use Adminetic\Contact\Imports\ContactsImport;
use Adminetic\Contact\Http\Requests\ContactRequest;
use Adminetic\Contact\Contracts\ContactRepositoryInterface;



class ContactController extends Controller
{
    protected $contactRepositoryInterface;

    public function __construct(ContactRepositoryInterface $contactRepositoryInterface)
    {
        $this->contactRepositoryInterface = $contactRepositoryInterface;
        $this->authorizeResource(Contact::class, 'contact');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact::admin.contact.index', $this->contactRepositoryInterface->indexContact());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact::admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Adminetic\Contact\Http\Requests\ContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $this->contactRepositoryInterface->storeContact($request);
        return redirect(adminRedirectRoute('contact'))->withSuccess('Contact Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Adminetic\Contact\Models\Admin\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('contact::admin.contact.show', $this->contactRepositoryInterface->showContact($contact));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Adminetic\Contact\Models\Admin\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contact::admin.contact.edit', $this->contactRepositoryInterface->editContact($contact));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Adminetic\Contact\Http\Requests\ContactRequest  $request
     * @param  \Adminetic\Contact\Models\Admin\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, Contact $contact)
    {
        $this->contactRepositoryInterface->updateContact($request, $contact);
        return redirect(adminRedirectRoute('contact'))->withInfo('Contact Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Adminetic\Contact\Models\Admin\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $this->contactRepositoryInterface->destroyContact($contact);
        return redirect(adminRedirectRoute('contact'))->withFail('Contact Deleted Successfully.');
    }

    /**
     *
     * Import Contacts
     *
     */
    public function import()
    {
        Excel::import(new ContactsImport, request()->file('contacts_import'));
        return redirect(adminRedirectRoute('contact'))->withSuccess('Contacts Imported.');
    }

    /**
     *
     * Export Contacts
     *
     */
    public function export()
    {
        return Excel::download(new ContactsExport, 'contacts.xlsx');
    }
}
