<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function getCreateVehicle()
    {
        return view('vehicle.create');
    }

    public function createVehicle(Request $request)
    {
        Vehicle::create([
            'name' => $request->name,
            'gas_consumption' => $request->gas_consumption,
            'service_hours' => $request->service_hours,
        ]);
        return redirect(route('getVehicles'));
    }

    public function getVehicles()
    {
        $vehicles = Vehicle::all();
        return view('vehicle.view', ['vehicles' => $vehicles]);
    }

    // public function getStudentById($id)
    // {
    //     $student = Student::find($id);
    //     return view('update', ['student' => $student]);
    // }

    // public function updateStudent(StudentRequest $request, $id)
    // {
    //     $student = Student::find($id);
    //     $student->update([
    //         'name' => $request->name,
    //         'NIM' => $request->NIM,
    //         'birth' => $request->birth,
    //         'age' => $request->age,
    //         'class' => $request->class,
    //     ]);
    //     return redirect(route('getStudents'));
    // }

    // public function deleteStudent($id)
    // {
    //     Student::destroy($id);
    //     return redirect(route('getStudents'));
    // }

    // public function getHomePage()
    // {
    //     return view('welcome2');
    // }

    // public function searchStudents()
    // {
    //     $search_text = $_GET['query'];
    //     $students = Student::where('name', 'LIKE', '%' . $search_text . '%')->orWhere('NIM', 'LIKE', '%' . $search_text . '%')->get();

    //     return view('search', ['studentz' => $students]);
    // }
}
