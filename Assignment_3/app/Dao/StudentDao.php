<?php

namespace App\Dao;
use App\Models\Major;
use App\Models\Student;
use App\Contracts\Dao\StudentDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Query\Builder;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Connection;
use Illuminate\Foundation\Bootstrap\HandleExceptions;

/**
 * Data accessing object for post
 */
class StudentDao implements StudentDaoInterface
{
  /**
   * To show students list
   */
    public function showStudents() {
        $studentsList = DB::table('students')
                        ->join('majors', 'majors.id', '=', 'students.major_id')
                        ->select('students.id','students.name', 'students.father_name','students.gender','students.dob','students.address','majors.major_name')
                        ->orderby('students.id')
                        ->paginate(6);
        return $studentsList;
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
     * To delete Student by id
     */
    public function updateStudent(Request $request, $id) {
        $major = Major::select('id')->where('major_name','=', $request->major)->first();

        DB::table('students') ->join('majors', 'majors.id', '=', 'students.major_id')
            ->where('students.id' , $id)
            ->update([
                'name'=>$request->name,
                'father_name'=>$request->father_name,
                'gender'=>$request->gender,
                'dob'=>$request->dob,
                'address'=>$request->address,
                'major_id'=>$major->id
            ]);
    }
    /**
     * To delete Student by id
     */
    public function deleteStudent($id) {
        Student::find($id)->delete();
    } 
    public function getSearchList(request $request) { 
        if(isset($request->search) ) { 
            if(!empty($request->findname) or !empty($request->findaddress) or !empty($request->start) or !empty($request->end)) {
                $start = $request->start;
                $end = $request->end;
                if($request->findname) {
                    $studentsList = DB::table('students as std')
                                    ->join('majors as mj', 'mj.id', '=', 'std.major_id')
                                    ->select(
                                        DB::raw('std.id as id'),
                                        DB::raw('std.name as name'),
                                        DB::raw('std.father_name as father_name'),
                                        DB::raw('std.gender as gender'),
                                        DB::raw('std.dob as dob'),
                                        DB::raw('std.address as address'),
                                        DB::raw('mj.major_name as major_name')
                                    )
                                    ->orderby('std.id')
                                    ->where('std.name', 'LIKE', '%'.$request->findname.'%')
                                    ->paginate(6); 
                }  
                if($request->findaddress) {
                    $studentsList = DB::table('students as std')
                                    ->join('majors as mj', 'mj.id', '=', 'std.major_id')
                                    ->select(
                                        DB::raw('std.id as id'),
                                        DB::raw('std.name as name'),
                                        DB::raw('std.father_name as father_name'),
                                        DB::raw('std.gender as gender'),
                                        DB::raw('std.dob as dob'),
                                        DB::raw('std.address as address'),
                                        DB::raw('mj.major_name as major_name')
                                    )
                                    ->orderby('std.id')
                                    ->where('std.address', 'LIKE', '%'.$request->findaddress.'%')
                                    ->paginate(6);
                }
                if($request->start) {
                    $studentsList = DB::table('students as std')
                                    ->join('majors as mj', 'mj.id', '=', 'std.major_id')
                                    ->select(
                                        DB::raw('std.id as id'),
                                        DB::raw('std.name as name'),
                                        DB::raw('std.father_name as father_name'),
                                        DB::raw('std.gender as gender'),
                                        DB::raw('std.dob as dob'),
                                        DB::raw('std.address as address'),
                                        DB::raw('mj.major_name as major_name')
                                    )
                                    ->orderby('std.id')
                                    ->whereYear('std.created_at', '>=', $start)
                                    ->paginate(6);
                }
                if($request->end) {
                    $studentsList = DB::table('students as std')
                                    ->join('majors as mj', 'mj.id', '=', 'std.major_id')
                                    ->select(
                                        DB::raw('std.id as id'),
                                        DB::raw('std.name as name'),
                                        DB::raw('std.father_name as father_name'),
                                        DB::raw('std.gender as gender'),
                                        DB::raw('std.dob as dob'),
                                        DB::raw('std.address as address'),
                                        DB::raw('mj.major_name as major_name')
                                    )              
                                    ->orderby('std.id')
                                    ->whereYear('std.created_at', '<=', $end)
                                    ->paginate(6);
                                
                }
                if($request->findname && $request->findaddress) {
                    $studentsList = DB::table('students as std')
                                    ->join('majors as mj', 'mj.id', '=', 'std.major_id')
                                    ->select(
                                        DB::raw('std.id as id'),
                                        DB::raw('std.name as name'),
                                        DB::raw('std.father_name as father_name'),
                                        DB::raw('std.gender as gender'),
                                        DB::raw('std.dob as dob'),
                                        DB::raw('std.address as address'),
                                        DB::raw('mj.major_name as major_name')
                                    )
                                    ->orderby('std.id')
                                    ->where('std.name', 'LIKE', '%'.$request->findname.'%')
                                    ->where('std.address', 'LIKE', '%'.$request->findaddress.'%')
                                    ->paginate(6);  
                }
                if($request->findname && $request->start ) {
                    $studentsList = DB::table('students as std')
                                    ->join('majors as mj', 'mj.id', '=', 'std.major_id')
                                    ->select(
                                        DB::raw('std.id as id'),
                                        DB::raw('std.name as name'),
                                        DB::raw('std.father_name as father_name'),
                                        DB::raw('std.gender as gender'),
                                        DB::raw('std.dob as dob'),
                                        DB::raw('std.address as address'),
                                        DB::raw('mj.major_name as major_name')
                                    )
                                    ->orderby('std.id')
                                    ->where('std.name', 'LIKE', '%'.$request->findname.'%')
                                    ->whereYear('std.created_at', '>=', $start)
                                    ->paginate(6);  
                }
                if($request->findname && $request->end) {
                    $studentsList = DB::table('students as std')
                                    ->join('majors as mj', 'mj.id', '=', 'std.major_id')
                                    ->select(
                                        DB::raw('std.id as id'),
                                        DB::raw('std.name as name'),
                                        DB::raw('std.father_name as father_name'),
                                        DB::raw('std.gender as gender'),
                                        DB::raw('std.dob as dob'),
                                        DB::raw('std.address as address'),
                                        DB::raw('mj.major_name as major_name')
                                    )
                                    ->orderby('std.id')
                                    ->where('std.name', 'LIKE', '%'.$request->findname.'%')
                                    ->whereYear('std.created_at', '<=', $end)
                                    ->paginate(6);  
                }
                if($request->start && $request->end) {
                                    $studentsList = DB::table('students as std')
                                    ->join('majors as mj', 'mj.id', '=', 'std.major_id')
                                    ->select(
                                        DB::raw('std.id as id'),
                                        DB::raw('std.name as name'),
                                        DB::raw('std.father_name as father_name'),
                                        DB::raw('std.gender as gender'),
                                        DB::raw('std.dob as dob'),
                                        DB::raw('std.address as address'),
                                        DB::raw('mj.major_name as major_name')
                                    )
                                    ->orderby('std.id')
                                    ->whereYear('std.created_at', '>=', $start)
                                    ->whereYear('std.created_at', '<=', $end)
                                    ->paginate(6);  
                }
                if($request->findaddress && $request->start) {
                    $studentsList = DB::table('students as std')
                                    ->join('majors as mj', 'mj.id', '=', 'std.major_id')
                                    ->select(
                                        DB::raw('std.id as id'),
                                        DB::raw('std.name as name'),
                                        DB::raw('std.father_name as father_name'),
                                        DB::raw('std.gender as gender'),
                                        DB::raw('std.dob as dob'),
                                        DB::raw('std.address as address'),
                                        DB::raw('mj.major_name as major_name')
                                        )
                                    ->orderby('std.id')
                                    ->where('std.address', 'LIKE', '%'.$request->findaddress.'%')
                                    ->whereYear('std.created_at', '>=', $start)
                                    ->paginate(6);  
                }
                if($request->findaddress && $request->end) {
                    $studentsList = DB::table('students as std')
                                    ->join('majors as mj', 'mj.id', '=', 'std.major_id')
                                    ->select(
                                        DB::raw('std.id as id'),
                                        DB::raw('std.name as name'),
                                        DB::raw('std.father_name as father_name'),
                                        DB::raw('std.gender as gender'),
                                        DB::raw('std.dob as dob'),
                                        DB::raw('std.address as address'),
                                        DB::raw('mj.major_name as major_name')
                                    )
                                    ->orderby('std.id')
                                    ->where('std.address', 'LIKE', '%'.$request->findaddress.'%')
                                    ->whereYear('std.created_at', '<=', $end)
                                    ->paginate(6);  
                }
                if($request->findname && $request->findaddress && $request->start) {
                    $studentsList = DB::table('students as std')
                                    ->join('majors as mj', 'mj.id', '=', 'std.major_id')
                                    ->select(
                                        DB::raw('std.id as id'),
                                        DB::raw('std.name as name'),
                                        DB::raw('std.father_name as father_name'),
                                        DB::raw('std.gender as gender'),
                                        DB::raw('std.dob as dob'),
                                        DB::raw('std.address as address'),
                                        DB::raw('mj.major_name as major_name')
                                    )
                                    ->orderby('std.id')
                                    ->where('std.name', 'LIKE', '%'.$request->findname.'%')
                                    ->where('std.address', 'LIKE', '%'.$request->findaddress.'%')
                                    ->whereYear('std.created_at', '>=', $start)
                                    ->paginate(6);  
                }
                if($request->findname && $request->start && $request->end) {
                    $studentsList = DB::table('students as std')
                                        ->join('majors as mj', 'mj.id', '=', 'std.major_id')
                                        ->select(
                                            DB::raw('std.id as id'),
                                            DB::raw('std.name as name'),
                                            DB::raw('std.father_name as father_name'),
                                            DB::raw('std.gender as gender'),
                                            DB::raw('std.dob as dob'),
                                            DB::raw('std.address as address'),
                                            DB::raw('mj.major_name as major_name')
                                        )
                                        ->orderby('std.id')
                                        ->where('std.name', 'LIKE', '%'.$request->findname.'%')
                                        ->whereYear('std.created_at', '>=', $start)
                                        ->whereYear('std.created_at', '<=', $end)
                                        ->paginate(6);  
                }        
                if($request->findname && $request->findaddress && $request->end) {
                    $studentsList = DB::table('students as std')
                                        ->join('majors as mj', 'mj.id', '=', 'std.major_id')
                                        ->select(
                                            DB::raw('std.id as id'),
                                            DB::raw('std.name as name'),
                                            DB::raw('std.father_name as father_name'),
                                            DB::raw('std.gender as gender'),
                                            DB::raw('std.dob as dob'),
                                            DB::raw('std.address as address'),
                                            DB::raw('mj.major_name as major_name')
                                        )
                                        ->orderby('std.id')
                                        ->where('std.name', 'LIKE', '%'.$request->findname.'%')
                                        ->where('std.address', 'LIKE', '%'.$request->findaddress.'%')
                                        ->whereYear('std.created_at', '<=', $end)
                                        ->paginate(6);  
                }      
                if($request->findaddress && $request->start && $request->end) {
                        $studentsList = DB::table('students as std')
                                        ->join('majors as mj', 'mj.id', '=', 'std.major_id')
                                        ->select(
                                            DB::raw('std.id as id'),
                                            DB::raw('std.name as name'),
                                            DB::raw('std.father_name as father_name'),
                                            DB::raw('std.gender as gender'),
                                            DB::raw('std.dob as dob'),
                                            DB::raw('std.address as address'),
                                            DB::raw('mj.major_name as major_name')
                                        )
                                        ->orderby('std.id')
                                        ->where('std.address', 'LIKE', '%'.$request->findaddress.'%')
                                        ->whereYear('std.created_at', '>=', $start)
                                        ->whereYear('std.created_at', '<=', $end)
                                        ->paginate(6);  
                }
                if($request->findname && $request->findaddress && $request->start && $request->end) {
                    $studentsList = DB::table('students as std')
                                        ->join('majors as mj', 'mj.id', '=', 'std.major_id')
                                        ->select(
                                            DB::raw('std.id as id'),
                                            DB::raw('std.name as name'),
                                            DB::raw('std.father_name as father_name'),
                                            DB::raw('std.gender as gender'),
                                            DB::raw('std.dob as dob'),
                                            DB::raw('std.address as address'),
                                            DB::raw('mj.major_name as major_name')
                                        )
                                        ->orderby('std.id')
                                        ->where('std.name', 'LIKE', '%'.$request->findname.'%')
                                        ->where('std.address', 'LIKE', '%'.$request->findaddress.'%')
                                        ->whereYear('std.created_at', '>=', $start)
                                        ->whereYear('std.created_at', '<=', $end)
                                        ->paginate(6);  
                }
                return ($studentsList);     
            } else {
                $studentsList="";
                return ($studentsList);
            }
        }
    }
}
