<?php

namespace App\Exports;

use App\Deep_link;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DeeplinkExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Deep_link::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'Application ID',
            'Black Link',
            'Webmaster ID',
            'Offer ID',
            'Sub1',
            'Sub2',
            'Sub3',
            'Comment',
            'Create',
            'Update',
            'User ID',
        ];
    }
}
