<?php

namespace App\Http\Controllers;
use App\Contracts\Services\StudentServicesInterface;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    private $studentInterface;
    public function __construct(StudentServicesInterface $StudentServicesInterface)
    {
        $this->studentInterface = $StudentServicesInterface;
    }
    public function index()
    {
        return view('student.index');
    }
    /**
     * Display a listing of the resource.
     */
    public function fetchstudent()
    {
        $students = $this->studentInterface->showStudents();
        return response()->json([
            'students'=>$students,
        ]);
        //return view('student.index', compact('studentsList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
          //'id'=> 'required',
          'name'=> 'required|max:191',
          'father_name'=>'required',
          'gender'=>'required',
          'dob'=>'required',
          'address'=>'required|max:191',
          'major'=>'required',
        ]);
   
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }

        $this->studentInterface->storeStudent($request);
        return response()->json([
            'status'=>200,
            'message'=>'Student Added Successfully.'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = $this->studentInterface->editStudent($id);
        if($student)
        {
            return response()->json([
                'status'=>200,
                'student'=> $student,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Student Found.'
            ]);
        }
    //   return view('student.edit', compact('student'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            //'id'=> 'required',
            'name'=> 'required|max:191',
            'father_name'=>'required',
            'gender'=>'required',
            'dob'=>'required',
            'address'=>'required|max:191',
            'major'=>'required',
          ]);
      
          if($validator->fails())
          {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
          }

        $this->studentInterface->updateStudent($request, $id);
        return response()->json([
            'status'=>200,
            'message'=>'Student Updated Successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = $this->studentInterface->deleteStudent($id);
        if($student)
        {
            $student->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Student Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Student Found.'
            ]);
        }
    }
}
