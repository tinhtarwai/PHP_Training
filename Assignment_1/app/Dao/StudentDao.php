<?php

namespace App\Dao;
use App\Models\Major;
use App\Models\Student;
use App\Contracts\Dao\StudentDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 * Data accessing object for post
 */
class StudentDao implements StudentDaoInterface
{
  /**
   * To show students list
   */
  public function showStudents() {
    $students = DB::table('students')
                    ->join('majors', 'majors.id', '=', 'students.major_id')
                    ->select('students.id','students.name', 'students.father_name','students.gender','students.dob','students.address','majors.major_name', 'students.created_at')
            ->get();
            return $students;  
  }
   /**
   * To save Student
   */
  public function storeStudent(Request $request) {    
    $major = Major::select('id')->where('major_name','=', $request->major)->first();
  
    DB::table('students') ->join('majors', 'majors.id', '=', 'students.major_id')
                          ->insert([
                            'name'=>$request->name,
                            'father_name'=>$request->father_name,
                            'gender'=>$request->gender,
                            'dob'=>$request->dob,
                            'address'=>$request->address,
                            'major_id'=> $major->id,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                          ]);
  }
   /**
   * To update Student by id
   */
  public function updateStudent(Request $request, $id) {
      //$student = Student::find($id);
      
    $major = Major::select('id')->where('major_name','=', $request->major)->first();

    DB::table('students') ->join('majors', 'majors.id', '=', 'students.major_id')
                          ->where('students.id' , $id)
                          ->update([
                            'students.name'=>$request->name,
                            'students.father_name'=>$request->father_name,
                            'students.gender'=>$request->gender,
                            'students.dob'=>$request->dob,
                            'students.address'=>$request->address,
                            'students.major_id'=>$major->id,
                            'students.updated_at' => date('Y-m-d H:i:s')
                          ]); 
  }
   /**
   * To delete Student by id
   */
  public function deleteStudent($id) {
    $student = Student::find($id);
    return $student;    
  }
}
