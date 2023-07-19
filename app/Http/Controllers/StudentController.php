<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('id','DESC')->get();

        return view('students', compact('students'));
    }

    // Proses tambah data
    public function addStudent(Request $request)
    {
        $student = new Student();
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();
        return response()->json($student);
    }

    // Mengambil data student berdasarkan id
    public function getStudentById($id)
    {
        $student = Student::find($id);
        return response()->json($student);
    }

    // Proses mengubah data
    public function updateStudent(Request $request)
    {
        $student = Student::find($request->id);
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();
        return response()->json($student);
    }

    // Proses menghapus data
    public function deleteStudent($id)
    {
        $student = Student::find($id);
        $student->delete();
        return response()->json(['success'=>'Data Student berhasil dihapus']);
    }

    // Proses menghapus data yang dipilih menggunakan checkbox
    public function deleteCheckedStudents(Request $request)
    {
        $ids = $request->ids;
        Student::whereIn('id',$ids)->delete();
        return response()->json(['success'=>"Student yang dipilih berhasil dihapus"]);
    }
}
