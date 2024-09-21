<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\User;

class UserExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return User::select('name', 'email', 'usertype', 'phone', 'address')->get();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'User Type',
            'Phone',
            'Address',
        ];
    }
}
