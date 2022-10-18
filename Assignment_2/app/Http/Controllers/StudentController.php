<?php

namespace App\Http\Controllers;
use App\Contracts\Services\StudentServicesInterface;
use App\Models\Student;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Foundation\Bootstrap\HandleExceptions;

class StudentController extends Controller
{
    private $studentInterface;
    public function __construct(StudentServicesInterface $StudentServicesInterface)
    {
        $this->studentInterface = $StudentServicesInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentsList = $this->studentInterface->showStudents();
        return view('student.index', compact('studentsList'));
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
        $this->studentInterface->storeStudent($request);
        return redirect('/')->with('successAlert','You have inserted successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = $this->studentInterface->editStudent($id);
       return view('student.edit', compact('student'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->studentInterface->updateStudent($request, $id);
        return redirect('/')->with('successAlert','You have updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->studentInterface->deleteStudent($id);
        return redirect('/')->with('successAlert','You have deleted successfully!');
    }

    public function export() 
    {
        return Excel::download(new StudentsExport, 'student.xlsx');
    }

    public function import(Request $request){
        Excel::import(new StudentsImport, $request->file('uploadfile'));
        return redirect('/')->with('successAlert', 'Here is updated information!');
    }
}
