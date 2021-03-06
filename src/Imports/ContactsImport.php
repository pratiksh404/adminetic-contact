<?php

namespace Adminetic\Contact\Imports;

use Illuminate\Support\Collection;
use Adminetic\Contact\Models\Admin\Contact;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContactsImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            Contact::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'phone' => $row['phone'],
                'address' => $row['address'],
                'favorite' => $row['favorite'],
                'active' => $row['active']
            ]);
        }
    }
}
