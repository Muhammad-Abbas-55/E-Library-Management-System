<?php

namespace App\Exports;

use App\Models\Staff;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class StaffExport implements FromCollection,WithHeadings
{
		public function headings():array{
		return[
			'ID',
			'Name',
			'Phone',
			'Cnic',
			'Email',
			'Gender',
			'Type',
			'Created_At',
			'Updated_At',
			

		];
	}
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Staff::all();
    }
}
