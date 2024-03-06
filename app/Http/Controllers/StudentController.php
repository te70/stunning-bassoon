<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        try{
            $receiptImage = $request->file('receipt_image'); 
            $name= base64_encode(Carbon::now()).$receiptImage->getClientOriginalName();
            $receiptImage->move(public_path('receipts/'),$name);
            
            $resume = new Student();
            $resume->student_name = $request->input('student_name'); 
            $resume->student_id = $request->input('student_id');
            $resume->phone_number = $request->input('phone_number');
            $resume->expiry_date = $request->input('expiry_date');
            $resume->receipt_expiry = $request->input('receipt_expiry');
            $resume->receipt_image = $name;
            $resume->save();
            return redirect('/student');
        } catch(Exception $e){
            return redirect('/student');
        }
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('student.edit', compact('student', 'id'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        $receiptImage = $request->file('receipt_image'); 
        $name= base64_encode(Carbon::now()).$receiptImage->getClientOriginalName();
        $receiptImage->move(public_path('receipts/'),$name);

        $student->receipt_image = $name;
        $student->update();
        return redirect('/student');
    }

    public function destroy(Request $request)
    {
        try{
            $deleteStudent=Student::find($request->id);
            $deleteStudent->delete();
            return redirect('/student');
        } catch(Exception $e){
            abort(500);
        }
    }
}
