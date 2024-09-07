<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class StudentExport implements FromCollection,WithHeadings
{

	public function headings():array{
		return[
			'ID',
			'Name',
			'Fname',
			'Email',
			'Cell_no',
			'Gender',
			'Reg_no',
			'Cnic',
			'Batch',
			'Department',
			'Created at',
			'Updated at'

		];
	}
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::all();
        
    }
}
