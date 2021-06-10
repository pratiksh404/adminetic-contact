<?php

namespace Adminetic\Contact\Exports;

use Adminetic\Contact\Models\Admin\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;

class ContactsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Contact::latest()->get();
    }
}
