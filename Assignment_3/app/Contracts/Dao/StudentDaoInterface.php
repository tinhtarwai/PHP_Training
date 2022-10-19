<?php

namespace App\Contracts\Dao;
use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Student
 */
interface StudentDaoInterface
{
  /**
   * To show Student List
   */
  public function showStudents();
  /**
   * To save Student
   */
  public function storeStudent(Request $request);

  /**
   * To delete Student by id
   */
  public function deleteStudent($id);
   /**
   * To delete Student by id
   */
  public function updateStudent(Request $request, $id);
  public function getSearchList(request $request);
}
