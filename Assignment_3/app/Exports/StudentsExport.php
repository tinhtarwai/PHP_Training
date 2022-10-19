<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;

class StudentsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::all();
    }
    public function headings(): array{
        return [
            'id',
            'name',
            'father_name',
            'gender',
            'dob',
            'address',
            'major_id',
            'ceated_at',
            'updated_at'
        ];

    }
}
