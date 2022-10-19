<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory;

    protected $table = "students";
    protected $fillable = ['name','father_name','address','dob','gender', 'major_id'];
    protected $dates = ['dob'];  
    
    public static function getStudent() {
        $studentsList = DB::table('students')
        ->join('majors', 'majors.id', '=', 'students.major_id')
        ->select('students.id','students.name', 'students.father_name','students.gender','students.dob','students.address','majors.major_name')
        ->orderby('students.id')
        ->paginate(6);
        return $studentsList;
    }
}
