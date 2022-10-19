<?php

namespace App\Contracts\Services;
use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Student
 */
interface StudentServicesInterface
{
  /**
   * To get Student
   */
  public function showStudents();

  /**
   * To create Student
   */
  public function storeStudent(Request $request);

  /**
   * To edit Student by id
   */
  public function editStudent($id);
  public function updateStudent(Request $request, $id);
  public function deleteStudent($id);
  public function searchStudent(request $request);
}
