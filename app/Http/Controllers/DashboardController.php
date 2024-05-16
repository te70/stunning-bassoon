<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Mileage;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $bus1 = 'KBX123D';
        $students = Student::all();
        $paidStudents = Student::where('receipt_expiry','>', Carbon::now())->get();
        $consumption1= Mileage::where('number_plate', $bus1)->sum('mileage');
        return view('dashboard', compact('students', 'paidStudents', 'consumption1'));
    }
}
