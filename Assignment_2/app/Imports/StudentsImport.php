<?php

namespace App\Imports;

use App\Models\Student;
use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function transformDate($dob, $format = 'm-d-Y')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($dob));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format,$dob);
        }
    }
    public function model(array $row)
    {
        return new Student([
            'id' => $row['id'],           
            'name' => $row['name'],
            'father_name' => $row['father_name'], 
            'gender' => $row['gender'],
            'dob' => $this->transformDate($row['dob']),         
            'address' => $row['address'],
            'major_id' => $row['major_id'],
            'created_at' => $row['created_at'],
            'updated_at' => $row['updated_at']
        ]);
    }
}