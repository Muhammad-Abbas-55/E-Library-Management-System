<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'name' => $row['name'],
            'fname' => $row['fname'],
            'email' => $row['email'],
            'cell_no' => $row['cell_no'],
            'gender' => $row['gender'],
            'reg_no' => $row['reg_no'],
            'cnic' => $row['cnic'],
            'batch' => $row['batch'],
            'department' => $row['department'],
        ]);
    }
}
