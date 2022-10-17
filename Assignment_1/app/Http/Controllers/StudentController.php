<?php

namespace App\Http\Controllers;
use App\Contracts\Services\StudentServicesInterface;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
}
