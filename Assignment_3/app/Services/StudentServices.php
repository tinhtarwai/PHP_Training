<?php

namespace App\Services;

use App\Models\Student;
use App\Contracts\Services\StudentServicesInterface;
use App\Contracts\Dao\StudentDaoInterface;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

/**
 * Data accessing object for post
 */
class StudentServices implements StudentServicesInterface
{
    private $studentDao;
    
    public function __construct(StudentDaoInterface $studentDao)
    {
        $this->studentDao = $studentDao;
    }
  /**
   * To get Student
   */
  public function showStudents() {
    return $this->studentDao->showStudents();
  }

  /**
   * To create Student
   */
  public function storeStudent(request $request) {
    return $this->studentDao->storeStudent($request);
  }

  /**
   * To edit Student by id
   */
  public function editStudent($id) {
    $student = Student::find($id);
    return $student;
  }
  public function updateStudent(Request $request, $id) {
    return $this->studentDao->updateStudent($request, $id);
  }
  /**
   * To delete Student by id
   */
  public function deleteStudent($id){
    return $this->studentDao->deleteStudent($id);
  }
  public function searchStudent(request $request){
    return $this->studentDao->getSearchList($request);
  }

}
