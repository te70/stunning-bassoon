<?php

namespace App\Http\Controllers;

use App\Models\Mileage;
use Illuminate\Http\Request;
use Exception;

class MileageController extends Controller
{
    public function index()
    {
        $logs = Mileage::all();
        return view('mileage.index', compact('logs'));
    }

    public function create()
    {
        return view('mileage.create');
    }

    public function store(Request $request)
    {
        $morning_reading = $request->input('morning_reading');
        $evening_reading = $request->input('evening_reading');
        $mileageSub = $evening_reading - $morning_reading;

        $mileage = new Mileage();
        $mileage->morning_reading = $request->input('morning_reading');
        $mileage->evening_reading = $request->input('evening_reading');
        $mileage->number_plate = $request->input('number_plate');
        $mileage->mileage = $mileageSub;
        $mileage->save();

        return redirect('/mileage');
    }

    public function edit($id)
    {
        $log = Mileage::find($id);
        return view('mileage.edit', compact('log', 'id'));
    }

    public function update(Request $request, $id)
    {
        $morning_reading = $request->input('morning_reading');
        $evening_reading = $request->input('evening_reading');
        $mileageSub = $evening_reading - $morning_reading;

        $mileage = Mileage::find($id);
        $mileage->morning_reading = $request->input('morning_reading');
        $mileage->evening_reading = $request->input('evening_reading');
        $mileage->number_plate = $request->input('number_plate');
        $mileage->mileage = $mileageSub;
        $mileage->update();

        return redirect('/mileage');
    }

    public function destroy(Request $request)
    {
        try{
            $deleteStudent=Mileage::find($request->id);
            $deleteStudent->delete();
            return redirect('/mileage');
        } catch(Exception $e){
            abort(500);
        }
    }
}
