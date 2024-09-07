<?php

namespace App\Imports;

use App\Models\Staff;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StaffImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Staff([

            'name' => $row['name'],
            'phone' => $row['phone'],
            'cnic' => $row['cnic'],
            'email' => $row['email'],
            'gender' => $row['gender'],
            'type' => $row['type'],
        ]);
    }
}
