<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Travel;
use Exception;

class TravelController extends Controller
{
    public function index()
    {
        return view('check.index');
    }

    public function store(Request $request)
    {
        $id = $request->input('student_id');
        $student = Student::where("student_id", $id)->first();
       
        if($student === null)
        {
            return redirect()->route('check.index')->with('fail', 'Student has not paid'); 
        } else {
            $travel = new Travel();
            $travel->student_id = $request->input('student_id');
            $travel->save();
            return redirect()->route('check.index')->with('success', 'Student has paid');  
        }
    }

    public function travel()
    {
        $logs = Travel::all();
        return view('travel.index', compact('logs'));
    }

    public function destroy(Request $request)
    {
        try{
            $deleteStudent=Travel::find($request->id);
            $deleteStudent->delete();
            return redirect('/travel');
        } catch(Exception $e){
            abort(500);
        }
    }
}
